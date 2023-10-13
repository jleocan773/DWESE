<?php

$numeros = [4,5,7,10,60,90];

unset($numeros[3]);
//Aunque se meta en el índice [3] saldrá el último en el foreach
$numeros[3] = 123;
//Pero si se hace un sort se arregla
//sort($numeros);

foreach ($numeros as $numero){
    echo $numero;
    echo "<br>";
}

print_r($numeros);
