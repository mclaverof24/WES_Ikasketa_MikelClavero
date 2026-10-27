<?php
session_start();

// 2. PROCESAR ACCIÓN DE CERRAR SESIÓN (LOGOUT)
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    echo "Has cerrado sesión correctamente.<br><br>";
    echo '<a href="login.html">Volver al formulario de login</a>';
    exit();
}

// 3. PROCESAR ENVÍO DEL FORMULARIO DE LOGIN (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validar credenciales (aitor / 1234)
    if ($usuario === "aitor" && $password === "1234") {
        
        // Guardar variables en $_SESSION (Servidor)
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = "administrador";

        // Guardar Cookie durante 7 días (Cliente)
        setcookie("ultimo_usuario", $usuario, time() + (7 * 24 * 60 * 60));

    } else {
        echo "<p style='color: red;'>Usuario o contraseña incorrectos.</p>";
        echo '<a href="login.html">Intentar de nuevo</a>';
        exit();
    }
}

// 4. VERIFICAR SI EXISTE SESIÓN ACTIVA PARA MOSTRAR LA ZONA PRIVADA
if (isset($_SESSION['usuario'])) {
    $usuarioRecordado = $_COOKIE['ultimo_usuario'] ?? $_SESSION['usuario'];
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Panel Privado</title>
    </head>
    <body>
        <h2>Bienvenido/a, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
        <p>Tu rol de acceso es: <strong><?php echo $_SESSION['rol']; ?></strong></p>
        <p>Estado de sesión: <code>ACTIVA</code></p>
        
        <?php if (!empty($usuarioRecordado)): ?>
            <p><small>💡 Usuario registrado en cookie: <strong><?php echo htmlspecialchars($usuarioRecordado); ?></strong></small></p>
        <?php endif; ?>

        <hr>
        <a href="login.php?action=logout">Cerrar Sesión</a>
    </body>
    </html>
    <?php
} else {
    // Si se intenta entrar directamente a login.php sin estar autenticado
    echo "Acceso denegado. Debes iniciar sesión primero.<br><br>";
    echo '<a href="login.html">Ir al login</a>';
}
?>