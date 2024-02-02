<?php

/*
    Ejemplo 18 Añadir TODOS los archivos de una carpeta
*/

//Creamos un objeto de la clase zipArchive
$zip = new ZipArchive();

//Abrimos el archivo zip
if ($zip->open('cosas_del_pasado.zip', ZipArchive::CREATE) === true) {

    //Agregamos todos los archivos de una vez con glob
    $files = glob('images/*');

    foreach ($files as $file) {
        $zip->addFile($file);
    }

    //Cerramos el archivo
    $zip->close();
    echo "Se ha creado el archivo zip";
} else {
    echo "Error al crear el archivo zip";
}
