<?php

/*
        Ejemplo 05


    */


//Abrir archivo
$fichero = "files/ejemplo.txt";
$fp = fopen($fichero, "rb");

while (!feof($fp)) {

    $linea = fgets($fp);

    echo $linea;
    echo "<br>";
}

//Cerrar archivo
fclose($fp);
