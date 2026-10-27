<!-- Enunciado: Habilita el modo de tipado estricto al inicio del archivo. Crea una función multiplicar que exija dos
parámetros enteros (int) y devuelva un entero (int). Prueba a llamarla con valores correctos. -->

<?php
declare(strict_types=1); // Debe ser la primera línea del archivo

function multiplicar(int $a, int $b): int
{
    return $a * $b;
}

echo "Resultado: " . multiplicar(5, 4);

// Si intentaras ejecutar: multiplicar(5, "4"); 
// PHP lanzaría un Fatal Error (TypeError) inmediatamente.
?>

<!-- Explicación: declare(strict_types=1); obliga a PHP a validar estrictamente los tipos de datos pasados en los argumentos
y en el retorno, evitando conversiones implícitas no deseadas. -->