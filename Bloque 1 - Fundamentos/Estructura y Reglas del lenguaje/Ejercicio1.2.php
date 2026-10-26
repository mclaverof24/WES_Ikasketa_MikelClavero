<!-- Enunciado: Crea un script PHP mezclado con HTML que contenga un comentario de una línea usando # y un comentario
multilínea /* ... */ explicando la función del código. -->

<!DOCTYPE html>
<html>

<body>
    <?php
    # Este es un comentario de una sola línea estilo shell
    
    /* 
       Este es un comentario multilínea.
       Sirve para explicar bloques extensos de código.
    */

    echo "<h1>Página de prueba de comentarios</h1>";
    ?>
</body>

</html>

<!-- Explicación: En PHP puedes comentar líneas sueltas con // o # y bloques enteros con /* ... */. El servidor ejecuta lo
que está dentro de <?php ?> e ignora los comentarios al renderizar el HTML final. -->