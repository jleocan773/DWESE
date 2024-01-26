<?php

/*
        Ejemplo 07
*/


//Abrir archivo
$fichero = "files/datos.txt";

$datos_archivos = stat($fichero);

print_r($datos_archivos);