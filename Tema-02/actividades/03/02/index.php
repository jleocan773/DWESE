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


?>