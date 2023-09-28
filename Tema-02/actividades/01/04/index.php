<!DOCTYPE html>
<html lang="en" style="background-color: black; color: white;">

<!-- 
     
Crear en un script Php que cree dos variables una de tipo float y otra de tipo int. Almacenar en nuevas variables el resultado de la suma, resta, división, producto y potencia. 
Mostrar mediante var_dump() las variables con los resultados de las operaciones anteriores.

-->

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ejercicio 4</title>
</head>

<body>
     <?php
     $numeroInt = 50;
     $numeroFloat = 22.1245;
     
     $suma = $numeroInt + $numeroFloat;
     $resta = $numeroInt - $numeroFloat;
     $division = $numeroInt / $numeroFloat;
     $producto = $numeroInt * $numeroFloat;
     $potencia = pow($numeroInt, $numeroFloat);
     
     echo "Resultado de la suma: ";
     var_dump($suma);
     
     echo "<br>";
     echo "<br>";

     echo "Resultado de la resta: ";
     var_dump($resta);

      echo "<br>";
      echo "<br>";

     echo "Resultado de la división: ";
     var_dump($division);
     
     echo "<br>";
     echo "<br>";

     echo "Resultado del producto: ";
     var_dump($producto);
     
     echo "<br>";
     echo "<br>";

     echo "Resultado de la potencia: ";
     var_dump($potencia);
     ?>
</body>

</html>