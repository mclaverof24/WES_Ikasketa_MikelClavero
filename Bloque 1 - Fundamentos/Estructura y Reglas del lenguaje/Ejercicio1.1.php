<!-- /* Enunciado: Corrige el siguiente script para que funcione correctamente sin errores. Debe mostrar en pantalla el valor
de la variable $color en minúsculas y demostrar que la función echo funciona en mayúsculas. 

<?php
$color = "verde";
echo "El color es " . $COLOR;
?>
*/ -->

<?php
// Comentario de una línea
$color = "verde";

// 'ECHO' funciona porque las funciones/palabras clave son case-insensitive.
// '$color' debe estar en minúsculas porque las variables SÍ son case-sensitive.
echo "El color es " . $color;
?>

<!-- Las palabras clave como ECHO o echo no diferencian mayúsculas/minúsculas. Sin embargo, $COLOR no estaba definida porque
las variables sí diferencian mayúsculas y minúsculas ($color no es igual a $COLOR) -->