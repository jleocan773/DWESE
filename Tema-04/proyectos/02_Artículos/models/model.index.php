<?php

    /*

        Modelo: model.index.php
        Descripcion: Genera un array de instancias de Articulos

    */

    setlocale(LC_MONETARY,"es_ES");

    //Cargamos los arrays a partir de los métodos estáticos de la clase
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

    //Pero para los artículos tenemos que crear una clase porque el método no es estático
    $articulos = new ArrayArticulos();

    //Le metemos los datos
    $articulos -> getDatos();
?>