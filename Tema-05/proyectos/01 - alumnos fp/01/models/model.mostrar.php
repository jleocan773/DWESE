<?php

/*

        Modelo: model.mostrar.php
        Descripcion: muestra los detalles de un artículo sin edición

        Método GET:
                    - id del artículo que quiero editar

    */

// Cargamos las categorías y creamos un Array de Artículos
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

$articulos = new ArrayArticulos();
$articulos->getDatos();


// Obtengo el indice del  artículo que deseo editar
$indice = $_GET['indice'];


//Pillamos los datos del articulo que queremos editar
$articulo = $articulos->read($indice);

