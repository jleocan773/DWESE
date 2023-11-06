<?php

include("class/class.vehiculo.php");
include("class/class.deportivo.php");


$coche_1 = new Deportivo('audi q5', 'Gama todo terreno, Audi', 213, 'HRT 1457', "400 cc", 0);
$coche_2 = new Vehiculo();

$coche_1->aumentarVelocidad();

var_dump($coche_1);

$coche_1 -> velocidadMax();

var_dump($coche_1);
