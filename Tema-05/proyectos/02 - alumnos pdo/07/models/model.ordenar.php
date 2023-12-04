<?php

/*
    Model: model.ordenar.php
    Descripción: ORdena elementos según criterios 

    Método POST: Cargaré el criterio de ordenación
*/

//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$criterio_ordenacion = $_GET['criterio'];

//Conectamos a la base de datos
$conexion = new Alumnos();

//Le metemos los datos
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

//Con el método delete_alumno borramos el alumno a partir de los detalles del formulario
$alumnos = $conexion->order_alumnos($criterio_ordenacion);
