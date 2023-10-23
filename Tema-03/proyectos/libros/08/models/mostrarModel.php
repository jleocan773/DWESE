<?php

/*
    Modelo: mostrarModel.php
    Descripción: Edita  nuevo libro de la tabla

    Método GET: -id del libro a mostrar
*/

// Cargar la tabla
$libros = generar_tabla();

$id = $_GET['id'];


$indice_mostrar = buscar_en_tabla($libros, 'id', $id);

if ($indice_mostrar !== false) {
    $libro = $libros[$indice_mostrar];
} else {
    echo 'Error: libro no encontrado';
    exit();
}
