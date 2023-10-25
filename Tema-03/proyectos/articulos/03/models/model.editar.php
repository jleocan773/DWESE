<?php

/*
    Modelo: model.editar.php
    Descripción: Edita  nuevo articulo de la tabla

    Método GET: -id del articulo a editar
*/

// Cargar la tabla
$tabla = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];


$indice_editar = buscar_en_tabla($tabla, 'id', $id);

if ($indice_editar !== false) {
    $articulo = $tabla[$indice_editar];
} else {
    echo 'Error: articulo no encontrado';
    exit();
}
