<?php
$var = 3;

// conversión mediante las funciones
$var1 = strval($var);
$var2 = intval($var);
$var3 = floatval($var);

// muestra el tipo de datos y el valor
var_dump($var1);
var_dump($var2);
var_dump($var3);

// conversión (tipo dato) variable
$var1 = (int) $var;
$var2 = (float) $var;
$var3 = (string) $var;
$var4 = (array) $var;

// muestra el tipo de datos y el valor
var_dump($var1);
var_dump($var2);
var_dump($var3);
var_dump($var4);

// conversión mediante la función setype
settype($var1, "integer");
settype($var2, "float");
settype($var3, "string");
settype($var4, "boolean");


// muestra el tipo de datos y el valor
var_dump($var1);
var_dump($var2);
var_dump($var3);
var_dump($var4);
?>