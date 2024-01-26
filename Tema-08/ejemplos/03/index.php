<?php

    /*
        Ejemplo 03

        Añadir texto, fichero en otra carpeta

    */


    //Crear Archivo para añadir, si no existe lo crea

    //Apertura de archivo
    $fichero = "files/ejemplo.txt";
    $fp = fopen($fichero, "ab");

    //Escribir en el archivo
    fwrite($fp, "\nTengo Hambre");

    //Cierre de archivo
    fclose($fp);


    echo "Archivo Creado";