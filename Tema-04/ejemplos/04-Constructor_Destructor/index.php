<?php

include("class/class.vehiculo.php");

$coche_1 = new Vehiculo('audi q5', 'Gama todo terreno, Audi', 213, 'HRT 1457');
$coche_2 = new Vehiculo();

$coche_1->aumentarVelocidad();

var_dump($coche_1);
var_dump($coche_2);


unset($coche_2);
