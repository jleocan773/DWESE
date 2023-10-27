<?php

/*
    Modelo: model.ordenar.php
    Descripción: Ordena según criterio

    Método GET: -criterio por el cuál ordenar
*/

// Cargar la tabla
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

// Cargo el criterio de ordenación
$criterio = $_GET['criterio'];


$articulos = ordenar($articulos, $criterio);