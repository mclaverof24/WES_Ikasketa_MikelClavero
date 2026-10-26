<!-- Enunciado: Declara una variable $x = 5. Muestra el resultado de imprimir ++$x (pre-incremento) y luego el de $x++
(post-incremento) explicando la diferencia de comportamiento. -->

<?php
$x = 5;

// Pre-incremento: Primero suma 1 ($x pasa a 6) y luego muestra el valor (6)
echo "Pre-incremento: " . ++$x . "<br>"; // Muestra 6

// Post-incremento: Primero muestra el valor actual (6) y luego suma 1 ($x pasa a 7)
echo "Post-incremento: " . $x++ . "<br>"; // Muestra 6
echo "Valor final de x: " . $x;           // Muestra 7
?>

<!-- Explicación: ++$x incrementa la variable antes de devolver su valor. $x++ devuelve el valor actual antes de realizar el incremento -->