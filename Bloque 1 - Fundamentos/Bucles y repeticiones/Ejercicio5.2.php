<!-- Enunciado: Escribe un bucle do...while con una condición que sea falsa desde el principio (ej: $x = 10; while ($x < 5)),
    para comprobar que el código se ejecuta al menos una vez -->

<?php
$x = 10;

echo "Inicio del bucle do...while:<br>";
do {
    echo "Este mensaje se muestra aunque 10 no es menor que 5 (x = $x)<br>";
    $x++;
} while ($x < 5);
?>

<!-- Explicación: A diferencia del bucle while (que evalúa la condición al principio y podría no ejecutarse nunca), el bucle
do...while evalúa la condición al final, garantizando que el bloque interno se ejecute como mínimo una vez. -->