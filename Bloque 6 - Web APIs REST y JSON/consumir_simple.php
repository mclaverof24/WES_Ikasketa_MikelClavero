<?php
// URL del endpoint local (Asegúrate de ajustar la ruta según tu servidor)
$url = "http://localhost/wes/e1proiektuak/Bloque%206%20-%20Web%20APIs%20REST%20y%20JSON/api_jugadores.php";

// 1. Petición GET sencilla para leer la respuesta JSON en texto plano
$jsonRespuesta = @file_get_contents($url);

if ($jsonRespuesta === false) {
    die("Error: No se pudo conectar con el servicio web.");
}

// 2. Decodificar el JSON a un array asociativo de PHP (segundo parámetro = true)
$data = json_decode($jsonRespuesta, true);

// 3. Comprobar que la conversión fue correcta
if (isset($data['estado']) && $data['estado'] === 'ok') {
    echo "<h2>Plantilla obtenida desde la API (" . $data['total'] . " jugadores)</h2>";
    echo "<ul>";
    foreach ($data['datos'] as $jugador) {
        echo "<li>#{$jugador['dorsal']} - <strong>{$jugador['nombre']}</strong> ({$jugador['posicion']})</li>";
    }
    echo "</ul>";
} else {
    echo "Error al procesar la respuesta JSON.";
}
?>