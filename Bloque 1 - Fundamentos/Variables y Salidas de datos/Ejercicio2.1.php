<!-- Enunciado: Declara las variables $nombre, $edad y $ciudad. Muestra en pantalla una frase completa que las combine
utilizando el operador de concatenación -->

<?php
$nombre = "Mikel";
$edad = 22;
$ciudad = "Kabiezes";

// Concatenación usando el punto (.)
echo "Hola, me llamo " . $nombre . ", tengo " . $edad . " años y vivo en " . $ciudad . ".<br>";
?>

<!-- A diferencia de JavaScript (que usa +), PHP utiliza el punto . para unir textos y variables. Las variables deben empezar
siempre por $ y no pueden llevar números al inicio -->