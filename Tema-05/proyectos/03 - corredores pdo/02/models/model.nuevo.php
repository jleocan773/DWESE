<?php

    /*

        Modelo Nuevo

    */

    // Conectamos a la base de datos Maratoon
    $conexion = new Corredores();

    //Creamos las variables categorias y clubs que pillará las categorías y clubs de la tabla con sus métodos correspondientes para generar dinámicamente el formulario
    $categorias = $conexion->getCategorias();
    $clubs = $conexion->getClubs();


?>