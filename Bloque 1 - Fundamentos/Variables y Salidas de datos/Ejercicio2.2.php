<!-- Enunciado: Escribe un script que muestre cómo echo permite pasar varios argumentos separados por comas y cómo print
devuelve un valor 1 que se puede usar en una expresión -->

<?php
// echo admite múltiples parámetros separados por coma
echo "Texto 1", " - ", "Texto 2", " - ", "Texto 3<br>";

// print devuelve 1, por lo que se puede evaluar dentro de una asignación/expresión
$resultado = print("Hola con print<br>");
echo "El valor devuelto por print es: " . $resultado; // Muestra 1
?>

<!-- Explicación: echo es más rápido y acepta varios argumentos. print solo acepta un argumento y siempre devuelve 1 -->