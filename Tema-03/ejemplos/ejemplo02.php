<?php


$a = 1;
$b = "1";

$c = 4;
$d = 5;

//Este da falso porque la primera comparación no es del mismo tipo, una de las dos es false por lo tanto false
if (($a === $b) && ($c <= $d)) {
    echo "Verdadero";
} else {
    echo "Falso";
}

//Este da verdadero porque al menos una es verdadero
if (($a === $b) || ($c <= $d)) {
    echo "Verdadero";
} else {
    echo "Falso";
}

//Este da verdadero porque solo una es verdadero
if (($a === $b) xor ($c <= $d)) {
    echo "Verdadero";
} else {
    echo "Falso";
}
