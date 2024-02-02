<?php

/*
    Ejemplo 17 ZIP
    Para que esto funcione debemos de ir al php.ini y descomentar la línea extension=zip
    Debemos de reiniciar el servidor Apache para que surtan efecto los cambios
*/

//Creamos un objeto de la clase zipArchive
$zip = new ZipArchive();

//Abrimos el archivo zip
if ($zip->open('cosas_del_pasado.zip', ZipArchive::CREATE) === true) {

    //Agregamos un archivo
    $zip->addFile('images/cambrico.jpg');
    $zip->addFile('images/dinosaurio.jpg');
    $zip->addFile('images/gallina.jpg');

    //Cerramos el archivo
    $zip->close();
    echo "Se ha creado el archivo zip";
} else {
    echo "Error al crear el archivo zip";
}
