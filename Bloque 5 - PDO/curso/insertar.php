<?php
require_once 'conexion.php';

$nuevoNombre = 'Mikel';
$nuevoEmail = 'mikel@example.com';
$nuevaEdad = 25;

try {
    // Consulta con marcadores posicionales (?) o nombrados (:nombre)
    $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES (:nombre, :email, :edad)";
    $stmt = $pdo->prepare($sql);

    // Vincular variables explícitamente pasando el tipo de dato
    $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
    $stmt->bindParam(':email', $nuevoEmail, PDO::PARAM_STR);
    $stmt->bindParam(':edad', $nuevaEdad, PDO::PARAM_INT);

    // Ejecutar la inserción
    $stmt->execute();

    // Obtener el último ID generado por AUTO_INCREMENT
    $idGenerado = $pdo->lastInsertId();

    echo "Usuario insertado correctamente con el ID: " . $idGenerado;

} catch (PDOException $e) {
    echo "Error al insertar registro: " . $e->getMessage();
}
?>