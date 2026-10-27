<?php
require_once 'conexion.php';

$edadMinima = 20;

try {
    // 1. Preparar la consulta SQL con un marcador de posición (placeholder :)
    $sql = "SELECT id, nombre, email, edad FROM usuarios WHERE edad >= :edad";
    $stmt = $pdo->prepare($sql);

    // 2. Ejecutar pasando los parámetros vinculados de forma segura
    $stmt->execute([':edad' => $edadMinima]);

    // 3. Obtener todos los resultados con fetchAll()
    $usuarios = $stmt->fetchAll();

    echo "<h3>Usuarios con edad >= $edadMinima:</h3>";
    echo "<ul>";
    foreach ($usuarios as $u) {
        echo "<li>ID: {$u['id']} | Nombre: {$u['nombre']} | Email: {$u['email']} | Edad: {$u['edad']}</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "Error al consultar: " . $e->getMessage();
}
?>