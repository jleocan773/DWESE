<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    /*     Ejercicio 1.

    El ejercicio deberá ser guardado en DWES/TEMA02/ACTIVIDADES/ACTIVIDAD21
    
    Crear un script PHP que cumpla con los siguientes requisitos:
    
    Asignar a una variable un valor de cualquier tipo
    Mostrar el valor de la variable si se convierte a int
    Mostrar el valor de la variable si se convierte a bool
    Mostrar el valor de la variable si se convierte a string
    Mostrar el valor de la variable si se convierte a float

    De este ejercicio se deberán entregar 3 versiones, cada versión irá en su carpeta correspondiente:

    Usando las funciones de conversión, ejemplo intval().
    Usando la función settype()
    Haciendo la conversión de forma implícita, (int) $var

    */

    $tiburon = "Tiburón Duende";
    echo 'Valor de la variable $tiburon:';
    var_dump($tiburon);

    echo "<br>";
    $int = intval($tiburon);
    echo 'Valor de la variable $tiburon en intval:';
    var_dump($int);

    echo "<br>";
    $bool = boolval($tiburon);
    echo 'Valor de la variable $tiburon en boolval:';
    var_dump($bool);

    echo "<br>";
    $str = strval($tiburon);
    echo 'Valor de la variable $tiburon en strval:';
    var_dump($str);

    echo "<br>";
    $floatval = floatval($tiburon);
    echo 'Valor de la variable $tiburon en floatval:';
    var_dump($floatval);

    ?>
    
</body>
</html>