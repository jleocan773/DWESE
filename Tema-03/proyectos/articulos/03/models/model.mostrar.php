<?php

/*
    Modelo: model.mostrar.php
    Descripción: Muestra articulo de la tabla

    Método GET: -id del articulo a mostrar
*/

// Cargar la tabla
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];


$indice_mostrar = buscar_en_tabla($articulos, 'id', $id);

if ($indice_mostrar !== false) {
    $articulo = $articulos[$indice_mostrar];
} else {
    echo 'Error: articulo no encontrado';
    exit();
}
