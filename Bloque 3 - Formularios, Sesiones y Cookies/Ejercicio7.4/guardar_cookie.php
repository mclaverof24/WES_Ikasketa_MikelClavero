<?php
// 1. PROCESAR EL ENVÍO DEL CONSENTIMIENTO (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['aceptar'])) {
    if ($_POST['aceptar'] === 'si') {
        // Crear cookie por 30 días (30 días * 24 horas * 60 min * 60 seg)
        setcookie("cookies_aceptadas", "si", time() + (30 * 24 * 60 * 60));
        
        // Redireccionar a este mismo archivo para cargar la súperglobal $_COOKIE
        header("Location: guardar_cookie.php");
        exit();
    }
}

// 2. COMPROBAR SI LA COOKIE EXISTE EN EL NAVEGADOR DEL USUARIO
$haAceptado = isset($_COOKIE['cookies_aceptadas']) && $_COOKIE['cookies_aceptadas'] === 'si';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado de Cookies</title>
</head>
<body>

    <h2>Estado de tu Configuración</h2>

    <?php if ($haAceptado): ?>
        <div style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
            <strong>✓ Cookies Aceptadas:</strong> Ya has aceptado el aviso legal. Tu preferencia se ha guardado en el navegador.
        </div>
    <?php else: ?>
        <div style="padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
            <strong>⚠ Sin Configurar:</strong> Aún no has dado tu consentimiento sobre las cookies.
        </div>
        <br>
        <a href="aviso_cookie.html">Ir a aceptar cookies</a>
    <?php endif; ?>

</body>
</html>