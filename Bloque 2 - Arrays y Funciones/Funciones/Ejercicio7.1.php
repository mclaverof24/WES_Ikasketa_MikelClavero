<!-- Enunciado: Crea dos funciones: una que reciba un número por valor y le sume 10, y otra que reciba la variable por
referencia (&$num) y le sume 10. Muestra cómo cambia la variable original fuera de las funciones. -->

<?php
// Por valor (copia)
function sumarPorValor($num)
{
    $num += 10;
}

// Por referencia (& modifica la variable original)
function sumarPorReferencia(&$num)
{
    $num += 10;
}

$original = 5;

sumarPorValor($original);
echo "Tras sumarPorValor: $original <br>"; // Sigue siendo 5

sumarPorReferencia($original);
echo "Tras sumarPorReferencia: $original"; // Pasa a ser 15
?>

<!-- Explicación: El símbolo & en el argumento indica que PHP pasa la dirección de memoria original de la variable, por lo
que cualquier cambio dentro de la función afectará a la variable fuera de ella. -->