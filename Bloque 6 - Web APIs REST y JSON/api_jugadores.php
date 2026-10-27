<?php
// 1. Indicar al navegador/cliente que la respuesta es un JSON
header("Content-Type: application/json; charset=UTF-8");

// 2. Permitir peticiones desde otros dominios (CORS)
header("Access-Control-Allow-Origin: *");

// 3. Simulación de datos extraídos de la base de datos
$jugadores = [
    ["id" => 1, "nombre" => "Unai Simón", "posicion" => "Portero", "dorsal" => 1],
    ["id" => 2, "nombre" => "Nico Williams", "posicion" => "Delantero", "dorsal" => 10],
    ["id" => 3, "nombre" => "Oihan Sancet", "posicion" => "Centrocampista", "dorsal" => 8]
];

// 4. Establecer el código de estado HTTP 200 (OK)
http_response_code(200);

// 5. Convertir el array de PHP a formato JSON y enviarlo
echo json_encode([
    "estado" => "ok",
    "total" => count($jugadores),
    "datos" => $jugadores
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>