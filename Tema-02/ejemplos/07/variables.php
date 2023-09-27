<?php

//Tipos de Variables

//Tipo Boolean

$test = false;
echo "\$test: ";
var_dump($test);
echo "<br>";

//Tipo Integer
$edad = 17;
echo "\$edad: ";
var_dump($edad);
echo "<br>";

//Tipo Float
$altura = 1.70;
echo "\$altura: ";
var_dump($altura);
echo "<br>";

//Tipo Float Exponencial
$distancia = 1.70e4;
echo "\$distancia: ";
var_dump($distancia);
echo "<br>";

//Tipo String
$mensaje = "La distancia recorrida fue de $distancia km";
echo "\$mensaje: ";
var_dump($mensaje);
echo "<br>";

//Tipo String '
$mensaje = 'La distancia recorrida fue de $distancia km';
echo "\$mensaje: ";
var_dump($mensaje);
echo "<br>";

//Tipo String ' con valor de variable concatenando con .
$mensaje = 'La distancia recorrida fue de ' . $distancia . ' km';
echo "\$mensaje: ";
var_dump($mensaje);
echo "<br>";




?>