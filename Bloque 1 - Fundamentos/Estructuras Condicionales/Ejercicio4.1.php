<!-- Enunciado: Crea una variable $nota con un valor numérico e imprime su calificación correspondiente: "Suspenso" (<
    5), "Aprobado" (5 a 6.9), "Notable" (7 a 8.9) o "Sobresaliente" (9 a 10). -->

<?php
$nota = 8.5;

if ($nota < 5) {
    echo "Suspenso";
} elseif ($nota < 7) {
    echo "Aprobado";
} elseif ($nota < 9) {
    echo "Notable";
} else {
    echo "Sobresaliente";
}
?>

<!-- Explicación: if...elseif...else evalúa las condiciones en orden descendente secuencial hasta encontrar la primera que se cumpla. -->