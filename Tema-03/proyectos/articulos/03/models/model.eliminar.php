<?php

/*
    Modelo: model.eliminar.php
    Descripción: Elimina un articulo según su id
    Método GET: - id  del articulo que quiero eliminar

*/

// Cargar la tabla
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];
$indice = buscar_en_tabla($articulos, 'id', $id);


$articulos = eliminar($articulos, $indice);