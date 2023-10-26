<?php

/*
    Modelo: model.buscar.php
    Descripción: Busca según criterio

    Método GET: -expresión: prompt o expresión de búsqueda

*/


// Cargar la tabla
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

// Expresión de búsqueda
$expresión = $_GET['expresion'];

// Filtrar la tabla a partir de esa expresión
$aux = [];

foreach ($articulos as $articulo) {
    if (array_search($expresión, $articulo, false)) {
        $aux[] = $articulo;
    }
}   

// Validar la búsqueda
if(!empty($aux)) {
    $articulos = $aux;
}
