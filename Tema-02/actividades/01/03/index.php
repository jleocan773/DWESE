<!DOCTYPE html>
<html lang="en" style="background-color: black; color: white;">

<!-- 
     
Crear dos variables de tipo string y concatenar. Guardar resultado en nueva variable y mostrar resultado.
-->

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ejercicio 3</title>
</head>

<body>
     <?php
     echo "<h1> Título del Ejercicio 3</h1>";
     $texto1 = "Hola, ";
     $texto2 = " buenas tardes.";
     $textoConcatenado = $texto1 . $texto2;
     echo "Valor de la primera variable, texto1: " . $texto1;
     echo "<br>";
     echo "Valor de la segunda variable, texto2: " . $texto2;
     echo "<br>";
     echo "Valor de la tercera variable, cuyo valor son las anteriores concatenadas: " . $textoConcatenado;
     ?>
</body>

</html>