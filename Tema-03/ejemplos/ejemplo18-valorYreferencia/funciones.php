<?php

    function sumar(int $var1, int $var2, &$resultado){
        $resultado = $var1 + $var2;
    }
    
    $r = 0;

    $n1 = 5;
    $n2 = 10;

    sumar($n1, $n2, $r);

    

    echo 'El resultado de ' . $n1 . '  +  ' . $n2 . '  = ' . $r;