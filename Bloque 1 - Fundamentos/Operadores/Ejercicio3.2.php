<!-- Enunciado: Dados dos valores booleanos, evalúa si la operación $a xor $b es verdadera y explica en qué caso da true a
diferencia del or convencional. -->

<?php
$a = true;
$b = true;

// XOR devuelve true SOLO si UNO de los dos es true, pero NO ambos a la vez
if ($a xor $b) {
    echo "XOR es verdadero (solo uno era verdadero)";
} else {
    echo "XOR es falso (o ambos son verdaderos o ambos son falsos)";
}
?>

<!-- Explicación: El operador or / || devuelve true si al menos uno es verdadero (incluyendo cuando ambos lo son). El
operador xor devuelve true de manera exclusiva: uno debe ser verdadero y el otro falso. -->