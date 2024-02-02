<?php

/*
    Ejemplo 19 descomprimir los archivos
*/

// Creamos un objeto de la clase ZipArchive
$zip = new ZipArchive();

// Definimos el nombre del archivo ZIP
$zipFileName = 'cosas_del_pasado.zip';

// Abrimos el archivo ZIP
if ($zip->open($zipFileName) === true) {

    // Extraemos el contenido del archivo ZIP al directorio de destino
    $zip->extractTo("imagesV2");

    // Cerramos el archivo ZIP
    $zip->close();

    echo "Se ha descomprimido el archivo ZIP en el directorio";
} else {
    echo "Error al abrir el archivo ZIP.";
}
