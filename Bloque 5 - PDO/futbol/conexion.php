<?php
$host = 'localhost';
$dbname = 'futbol_db';
$usuario = 'mclaverof24';
$password = 'root'; // En XAMPP suele ir vacío, en MAMP es 'root'

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
}
?>