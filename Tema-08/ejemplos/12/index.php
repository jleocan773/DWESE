<?php

/*
        Ejemplo 12

        Glob()

        Permite Especificar un patrón
*/


//Abrir el directorio files
//Seleccionar todos los archivos
$archivos = glob('files/*');

print_r($archivos);