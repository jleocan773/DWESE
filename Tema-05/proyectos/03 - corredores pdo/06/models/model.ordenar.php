<?php

/*
    Model: model.ordenar.php
    Descripción: Ordena elementos según criterios 

    Método POST: Cargaré el criterio de ordenación
*/

//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$criterio_ordenacion = $_GET['criterio'];

//Conectamos a la base de datos
$conexion = new Corredores();

//Con el método delete_alumno borramos el alumno a partir de los detalles del formulario
$corredores = $conexion->orderCorredores($criterio_ordenacion);
