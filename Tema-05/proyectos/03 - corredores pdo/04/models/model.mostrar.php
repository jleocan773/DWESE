<?php

/*
    Model: model.mostrar.php
    Descripción: Muestra un elemento

    Método POST: Cargaré las variables necesarias para mostrar un nuevo elemento
    
*/

//Pillamos el id del elemento que se va a mostrar a través de la variable indice del index
$id_corredor = $_GET['id']; // Capturar el ID del corredor desde la URL

//Conectamos a la base de datos Maratoon
$conexion = new Corredores();

//Creamos las variables categorias y clubs que pillará las categorías y clubs de la tabla con sus métodos correspondientes para generar dinámicamente el formulario
$categorias = $conexion->getCategorias();
$clubs = $conexion->getClubs();

//Pillamos el corredor a mostrar mediante su id con un método
$corredor_mostrar = $conexion->getCorredorPorID($id_corredor);
