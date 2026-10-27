<?php
$host = 'localhost';
$dbname = 'curso_db';
$usuario = 'mclaverof24';
$password = 'root'; // En XAMPP suele estar vacío, en MAMP suele ser 'root'

try {
    // Crear instancia de PDO con el DSN (Data Source Name)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario, $password);
    
    // Configurar el modo de error de PDO para lanzar excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar el modo de obtención predeterminado a array asociativo
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Conexión a la base de datos establecida con éxito.<br>";

} catch (PDOException $e) {
    // Si la conexión falla, se captura la excepción para no exponer credenciales
    die("Error crítico de conexión: " . $e->getMessage());
}
?>