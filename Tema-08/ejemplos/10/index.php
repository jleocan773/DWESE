<?php

/*
        Ejemplo 10

        Mostrar contenido Directorios
*/


//Mostrar carpeta actual con ruta absoluta
echo "Directorio actual: " . getcwd();
echo "<br>";

//Obtener contenido del directorio actual
$contenido = scandir(getcwd());

print_r($contenido);
