<?php

/*

        Modelo: model.buscar.php
        Descripcion: filtra los artículos  a partir de la expresión búsqueda

        Método GET:
                    - expresion: prompt o expresión de búsqueda
    */

// Cargar las categorías y crear un Array de Artículos
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

$articulos = new ArrayArticulos();
$articulos->getDatos();

// Cargo la expresion de búsqueda
$expresion = $_GET['expresion'];

// Filtrar la tabla  a partir de esa expresión
$articulos  = filtrar($articulos, $expresion);
