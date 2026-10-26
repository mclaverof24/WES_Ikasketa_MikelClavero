<!-- Enunciado: Genera la tabla de multiplicar del número 7 (del 1 al 10) formateada dentro de una lista HTML usando un bucle for -->

<?php
$numero = 7;

echo "<h3>Tabla del $numero</h3>";
echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "<li>$numero x $i = $resultado</li>";
}
echo "</ul>";
?>

<!-- Explicación: El bucle for se usa cuando conocemos el número exacto de iteraciones. Agrupa en la misma línea la
inicialización ($i = 1), la condición ($i <= 10) y el incremento ($i++) -->