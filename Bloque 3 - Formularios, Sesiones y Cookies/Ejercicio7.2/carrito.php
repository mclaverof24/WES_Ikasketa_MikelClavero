<?php
// 1. Iniciar la sesión al principio
session_start();

// 2. Inicializar el array del carrito en la sesión si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// 3. Procesar adición de producto (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['producto'], $_POST['precio'])) {
    $nuevoProducto = [
        'nombre' => htmlspecialchars($_POST['producto']),
        'precio' => (float)$_POST['precio']
    ];
    
    // Guardar en $_SESSION
    $_SESSION['carrito'][] = $nuevoProducto;
    
    // Redireccionar a sí mismo para evitar re-envíos duplicados al recargar
    header("Location: carrito.php");
    exit();
}

// 4. Procesar vaciado del carrito (GET)
if (isset($_GET['action']) && $_GET['action'] === 'vaciar') {
    $_SESSION['carrito'] = [];
    header("Location: carrito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito de la Compra</title>
</head>
<body>

    <h2>Tu Carrito de la Compra</h2>

    <?php if (empty($_SESSION['carrito'])): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <ul>
            <?php 
            $total = 0;
            foreach ($_SESSION['carrito'] as $item): 
                $total += $item['precio'];
            ?>
                <li><?php echo $item['nombre']; ?>: <strong><?php echo number_format($item['precio'], 2); ?>€</strong></li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Total acumulado: <?php echo number_format($total, 2); ?>€</strong></p>
        <p><a href="carrito.php?action=vaciar">Vaciar Carrito</a></p>
    <?php endif; ?>

    <hr>
    <a href="carrito.html">seguir añadiendo productos</a>

</body>
</html>