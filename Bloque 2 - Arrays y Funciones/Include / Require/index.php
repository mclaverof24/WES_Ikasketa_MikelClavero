<?php
// 1. OBLIGATORIO: Cargar datos de configuración indispensables.
// Si 'config.php' no existe, el script se detiene aquí (Fatal Error).
require_once 'config.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $tituloSitio; ?></title>
</head>
<body>

    <h1>Bienvenido a <?php echo $tituloSitio; ?></h1>
    <p>Esta es la página principal que utiliza datos importados.</p>

    <?php 
    // 2. OPCIONAL: Cargar el pie de página.
    // Si 'footer.php' no existe o falla, solo muestra un Warning y sigue mostrando la web.
    include 'footer.php'; 
    ?>

</body>
</html>