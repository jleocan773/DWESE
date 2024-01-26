<?php

    /*
        Ejemplo 02

        Añadir texto

    */


    //Crear Archivo para añadir, si no existe lo crea

    //Apertura de archivo
    $fichero = "ejemplo.txt";
    $fp = fopen($fichero, "ab");

    //Escribir en el archivo
    fwrite($fp, "\nTengo Hambre");

    //Cierre de archivo
    fclose($fp);


    echo "Archivo Creado";