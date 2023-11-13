<?php

/*

        Modelo: model.ordenar.php
        Descripcion: Muestra los artículos  a partir de un  criterio de ordenación

        Método GET:
                    - critero: descripcion, modelo, marca, categorias, unidades, precio
    */

// Cargar las categorías y crear un Array de Artículos
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

$articulos = new ArrayArticulos();
$articulos->getDatos();

// Cargar el criterio de ordenación
$criterio = $_GET['criterio'];

// Ordena los artículos
$articulos->ordenarArticulos($criterio);

// Ahora, $articulos->tabla contiene los artículos ordenados
$articulosOrdenados = $articulos->getTabla();