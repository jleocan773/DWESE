<?php

// Ejercicio 4. empty().

// Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores falsos para la función empty()
// Tres Valores Verdaderos para empty()
$var1Vacia = "";
$var2ArrayVacio = array();
$var3Cero = 0;

$verdadero1 = empty($var1Vacia);
$verdadero2 = empty($var2ArrayVacio);
$verdadero3 = empty($var3Cero);

echo "Valores verdaderos: ";
echo "<br>";

echo "empty() de la primera variable: " . $verdadero1;
echo "<br>";

echo "empty() de la segunda variable: " . $verdadero2;
echo "<br>";

echo "empty() de la tercera variable: " . $verdadero3;

// Tres Valores Falsos para empty()
$var4BooleanTrue = true;
$var5StringNoVacia = "Hola, soy una cadena que no está vacía :DDDDD";
$var6NumeroNoCero = 42;

$falso1 = empty($var4BooleanTrue);
$falso2 = empty($var5StringNoVacia);
$falso3 = empty($var6NumeroNoCero);

echo "<br>";
echo "<br>";

echo "Valores falsos: ";
echo "<br>";

echo "empty() de la cuarta variable: " . $falso1;
echo "<br>";

echo "empty() de la quinta variable: " . $falso2;
echo "<br>";

echo "empty() de la sexta variable: " . $falso3;


?>