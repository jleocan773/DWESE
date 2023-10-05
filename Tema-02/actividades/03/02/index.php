<?php
// Ejercicio 2. is_null().

// Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores falsos para la función is_null()
    //Tres Valores Verdaderos para is_null()
    $var1StringSinDeclarar;
    $var2ParaBorrar = "Esto tiene valor antes de ser borrado, al poner unset será nulo";
    unset($var2ParaBorrar);
    $var3Nula = null;
    
    $verdadero1 = is_null($var1StringSinDeclarar);
    $verdadero2 = is_null($var2ParaBorrar);
    $verdadero3 = is_null($var3Nula);
    echo "<br>";

    echo "Valores verdaderos: ";
    echo "<br>";

    echo "Valor de is_null() de la primera variable: " . $verdadero1;
    echo "<br>";

    echo "Valor de is_null() de la segunda variable: " . $verdadero2;
    echo "<br>";

    echo "Valor de is_null() de la tercera variable: " . $verdadero3;

    $color = "Rojo";
    $numeroEntero = 50;
    $booleanTrue = true;

    echo "<br>";

    $falso1 = is_null($color);
    $falso2 = is_null($numeroEntero);
    $falso3 = is_null($booleanTrue);

    echo "<br>";
    echo "Valores falsos: (No muestra nada porque es false)";
    echo "<br>";

    echo "Valor de is_null() de la cuarta variable: " . $falso1;
    echo "<br>";

    echo "Valor de is_null() de la quinta variable: " . $falso2;
    echo "<br>";

    echo "Valor de is_null() de la sexta variable: " . $falso3;

?>