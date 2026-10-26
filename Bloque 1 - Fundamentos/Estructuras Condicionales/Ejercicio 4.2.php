<!-- Enunciado: Dado un día de la semana en formato texto (ej: "lunes"), asigna un mensaje usando switch y luego haz lo mismo
usando la expresión match -->

<?php
$dia = "lunes";

// Opción 1: switch (requiere break)
switch ($dia) {
    case "lunes":
    case "martes":
        $mensajeSwitch = "Inicio de semana";
        break;
    case "viernes":
        $mensajeSwitch = "Casi fin de semana";
        break;
    default:
        $mensajeSwitch = "Otro día";
}

// Opción 2: match (comparación estricta y devuelve valor)
$mensajeMatch = match ($dia) {
    "lunes", "martes" => "Inicio de semana",
    "viernes" => "Casi fin de semana",
    default => "Otro día",
};

echo "Switch: " . $mensajeSwitch . "<br>";
echo "Match: " . $mensajeMatch;
?>

<!-- Explicación: switch ejecuta bloques y requiere break para no seguir ejecutando casos. match compara de forma estricta
(===), devuelve el valor asignado de forma directa y tiene una sintaxis más limpia -->