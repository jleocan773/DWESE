<?php

/*
    Modelo: editarModel.php
    Descripción: Edita  nuevo libro de la tabla

    Método GET: -id del libro a editar
*/


$id = $_GET['id'];


$indice_editar = buscar_en_tabla($libros, 'id', $id);

if ($indice_editar !== false) {
    $libro = $libros[$indice_editar];
} else {
    echo 'Error: libro no encontrado';
    exit();
}
