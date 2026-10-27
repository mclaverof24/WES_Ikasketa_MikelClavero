<!-- Enunciado: Dado el array $precios = ["Manzana" => 2.5, "Plátano" => 1.2, "Naranja" => 1.8], ordénalo primero por valor
de menor a mayor manteniendo las claves (asort), y después por clave alfabéticamente (ksort). -->

<?php
$precios = ["Manzana" => 2.5, "Plátano" => 1.2, "Naranja" => 1.8];

// 1. Ordenar por valor (precio) de menor a mayor manteniendo claves
asort($precios);
echo "<strong>Ordenado por precio (asort):</strong><br>";
print_r($precios);
echo "<br><br>";

// 2. Ordenar por clave (nombre del producto) alfabéticamente
ksort($precios);
echo "<strong>Ordenado por producto (ksort):</strong><br>";
print_r($precios);
?>

<!-- Explicación: asort() ordena por valor preservando la relación clave-valor. ksort() ordena directamente por las claves
del array. (Si usaras sort(), se perderían las claves originales y se reindexarían numéricamente). -->