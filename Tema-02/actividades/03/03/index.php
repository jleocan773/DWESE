<?php

// Ejercicio 3. issetl().

//Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores falsos para la función isset()

$var1Declarada = "Esta variable está declarada";
$var2Array = array(1,2,3);
$var3Numero = 42;

$verdadero1 = isset($var1Declarada);
$verdadero2 = isset($var2Array[0]);
$verdadero3 = isset($var3Numero);

echo "<br>";

echo "Valores verdaderos: ";
echo "<br>";

echo "isset() de la primera variable: " . $verdadero1;
echo "<br>";

echo "isset() de la segunda variable: " . $verdadero2;
echo "<br>";

echo "isset() de la tercera variable: " . $verdadero3;

// Tres Valores Falsos para isset()
$var4NoDeclarada;
$var5ArrayNoDefinido;
$var6Nula = null;

$falso1 = isset($var4NoDeclarada);
$falso2 = isset($var5ArrayNoDefinido["inexistente"]);
$falso3 = isset($var6Nula);

echo "<br>";
echo "<br>";

echo "Valores falsos: ";
echo "<br>";

echo "isset() de la cuarta variable: " . $falso1;
echo "<br>";

echo "isset() de la quinta variable: " . $falso2;
echo "<br>";

echo "isset() de la sexta variable: " . $falso3;
?>

