<?php

    /*

        Modelo: model.nuevo.php
        Descripcion: Carga arrays para poder generar un nuevo formulario

    */

    //Cargamos los arrays a partir de los métodos estáticos de la clase
    $categorias = ArrayArticulos::getCategorias();
    $marcas = ArrayArticulos::getMarcas();

?>