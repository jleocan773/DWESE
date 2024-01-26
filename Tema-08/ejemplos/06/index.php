<?php

/*
        Ejemplo 06
*/


//Abrir archivo
$fichero = "files/datos.txt";

if (is_file($fichero)) {

    echo "Es un fichero";
    echo "<br>";
    echo "Tamaño del fichero : " . filesize($fichero) . " Bytes";
    echo "<br>";
    echo "Fecha del fichero : " . filemtime($fichero);
    echo "<br>";
    echo "Tipo del fichero : " . filetype($fichero);
}



if (is_dir('files')) {
    echo "<br>";
    echo "<br>";
    echo "Files " . " es una carpeta";
}
