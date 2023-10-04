<?php
// Ejercicio 1. Conversiones de datos en expresiones.

// Crear un script PHP donde se muestre el tipo de dato y resultado de las siguientes expresiones matemáticas:
// Multiplica valor entero con una cadena que contiene un número inicial
$intParaMultiplicar = 2;
$stringParaMultiplicar = "420Soy un String Feliz :D";

$multiplicacion = $intParaMultiplicar * $stringParaMultiplicar;
echo $multiplicacion;
echo "<br>";

// Sumar valor entero con cadena con número inicial
$intParaSumar = 999;
$stringParaSumar = "1MiauMiauMiau";

$suma = $intParaSumar + $stringParaSumar;
echo $suma;
echo "<br>";
echo "<br>";

// Sumar valor entero con valor float
$intParaFloat = 50;
$floatParaInt = 12.3456;

$intmasfloat = $intParaFloat + $floatParaInt;
echo $intmasfloat;
echo "<br>";
echo "<br>";

// Concatenar valor entero con cadena
$intParaConcatenar = 666;
$cadenaParaConcatenar = " Soy una cadena";

$intConcatenadoConCadena = $intParaConcatenar . $cadenaParaConcatenar;
echo $intConcatenadoConCadena;
echo "<br>";
echo "<br>";

// Sumar valor entero con valor booleano
$intParaSumarBooleano = 777;
$booleanParaSumarConInt = true;

$sumaIntBooleano = $intParaSumarBooleano + $booleanParaSumarConInt;
echo $sumaIntBooleano;

?>