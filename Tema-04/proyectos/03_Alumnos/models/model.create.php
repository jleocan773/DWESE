<?php

    /*

        Modelo: model.create.php
        Descripcion: añade un nuevo  artículo en a la tabla

        Método POST:
                    - id
                    - descripcion
                    - modelo
                    - marca (mostrado como índice)
                    - categorias (mostrado como array)
                    - unidades
                    - precio

    */

    //Cargo en una variable los valores del articulo


    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();
    $articulos = new ArrayArticulos();
    $articulos -> getDatos();

    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $categorias_new_articulo = $_POST['categorias'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];
    


    //Validación (no la haremos)

    //Creo un Objeto de Clase Articulo a partir de los detalles del formulario

    $new_articulo = new Articulo (
        $id,
        $descripcion,
        $modelo,
        $marca,
        $categorias_new_articulo,
        $unidades,
        $precio
);

    //Añadimos el artículo a la tabla
    $articulos -> create($new_articulo);

    //Generar notificacion
    $notificacion = "Articulo creado correctamente";

?>