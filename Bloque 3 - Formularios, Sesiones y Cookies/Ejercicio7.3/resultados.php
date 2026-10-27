<?php
// Comprobar que los parámetros se han recibido por GET
$busqueda = isset($_GET['q']) ? htmlspecialchars(trim($_GET['q'])) : '';
$categoria = isset($_GET['categoria']) ? htmlspecialchars($_GET['categoria']) : 'todas';
$precioMax = isset($_GET['precio_max']) ? (float)$_GET['precio_max'] : 0;

// Simulación de una base de datos de productos
$productosBD = [
    ["nombre" => "Portátil HP", "categoria" => "electronica", "precio" => 650],
    ["nombre" => "Ratón Gamer", "categoria" => "electronica", "precio" => 35],
    ["nombre" => "Camiseta Algodón", "categoria" => "ropa", "precio" => 20],
    ["nombre" => "Lámpara de Escritorio", "categoria" => "hogar", "precio" => 45]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de la Búsqueda</title>
</head>
<body>

    <h2>Resultados del Filtro</h2>
    <p>Parámetros aplicados: 
        <strong>Texto:</strong> "<?php echo $busqueda; ?>" | 
        <strong>Categoría:</strong> <?php echo $categoria; ?> | 
        <strong>Precio máx:</strong> <?php echo $precioMax; ?>€
    </p>

    <hr>

    <ul>
        <?php
        $encontrados = 0;
        foreach ($productosBD as $prod) {
            // Aplicar filtros de coincidencia
            $coincideTexto = empty($busqueda) || stristr($prod['nombre'], $busqueda);
            $coincideCat = ($categoria === 'todas') || ($prod['categoria'] === $categoria);
            $coincidePrecio = ($precioMax <= 0) || ($prod['precio'] <= $precioMax);

            if ($coincideTexto && $coincideCat && $coincidePrecio) {
                echo "<li><strong>" . $prod['nombre'] . "</strong> - " . $prod['precio'] . "€ (" . $prod['categoria'] . ")</li>";
                $encontrados++;
            }
        }

        if ($encontrados === 0) {
            echo "<li>No se encontraron productos que coincidan con los criterios.</li>";
        }
        ?>
    </ul>

    <br>
    <a href="buscar.html">Realizar otra búsqueda</a>

</body>
</html>