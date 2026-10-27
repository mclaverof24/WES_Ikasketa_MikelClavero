<!-- Enunciado: Crea un array asociativo con el nombre de 4 estudiantes y sus notas. Recórrelo mediante un bucle foreach
imprimiendo el nombre, la nota y si el alumno está "APROBADO" ($\ge 5$) o "SUSPENSO" ($< 5$). -->

<?php
$notas = [
    "Aitor" => 8.5,
    "Miren" => 4.2,
    "Jon" => 6.0,
    "Ane" => 3.8
];

foreach ($notas as $estudiante => $nota) {
    $estado = ($nota >= 5) ? "APROBADO" : "SUSPENSO";
    echo "$estudiante: $nota ($estado)<br>";
}
?>

<!-- Explicación: En los arrays asociativos, foreach ($array as $clave => $valor) nos permite extraer tanto la clave (nombre
del estudiante) como el valor asociado (nota) en cada iteración. -->