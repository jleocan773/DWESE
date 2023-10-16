<?php

    function sumar(int $var1, int $var2){
        return $var1 + $var2;
    }
    function restar(int $var1, int $var2){
        return $var1 - $var2;
    }
    function multiplicar(int $var1, int $var2){
        return $var1 * $var2;
    }
    function dividir(int $var1, int $var2){
        return $var1 / $var2;
    }


    $n1 = 5;
    $n2 = 10;

    echo "Suma: " . sumar($n1,$n2); 
    echo "<br>";
    echo "Resta: " . restar($n1,$n2); 
    echo "<br>";
    echo "Multiplicación: " . multiplicar($n1,$n2); 
    echo "<br>";
    echo "División: " . dividir($n1,$n2); 
    echo "<br>";
