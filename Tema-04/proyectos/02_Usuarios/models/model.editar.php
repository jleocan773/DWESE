<?php

    /*

        Modelo: model.editar.php
        Descripcion: edita los detalles de un articulo

        Método GET:
                    - id del artículo que quiero editar

    */

    // Cargamos las categorías y creamos un Array de Artículos
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
    
    $articulos = new ArrayArticulos();
    $articulos -> getDatos();


    // Obtengo el indice del  artículo que deseo eliminar
    $indice = $_GET['indice'];





?>