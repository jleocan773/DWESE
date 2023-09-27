<?php

$var1 = 100;
$var3 = 200 + $var2;
echo $var3; // muestra 200 porque si usamos una variable no declarada pone 0 y 200 + 0 es 200
$var3 = 100 * $var2;
echo $var3; //muestra 0 porque 100 * 0 es 0

?>