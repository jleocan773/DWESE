<?php

    /*
        Ejemplo 04

        Añadir texto, fichero en otra carpeta

    */


    //Crear Archivo para añadir, si no existe lo crea

    //Apertura de archivo
    $fichero = "files/ejemplo.txt";
    $cadena = file_get_contents($fichero);

    $cadena = $cadena . "\n" . "Una nueva línea";

    file_put_contents($fichero, $cadena);

