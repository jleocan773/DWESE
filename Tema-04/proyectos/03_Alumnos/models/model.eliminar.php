<?php

    /*

        Modelo: model.eliminar.php
        Descripcion: elimina un elemento de la  tabla

        Método GET:
                    - id del artículo que quiero eliminar

    */

    // Cargamos las categorías y creamos un Array de Artículos
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
    
    $articulos = new ArrayArticulos();
    $articulos -> getDatos();


    // Obtengo el indice del  artículo que deseo eliminar
    $indice = $_GET['indice'];

    // Obtengo el índice  del artículo que deseo eliminar
    $articulos -> delete($indice);

    //Generar notificacion
    $notificacion = "Articulo borrado correctamente";



   

?>