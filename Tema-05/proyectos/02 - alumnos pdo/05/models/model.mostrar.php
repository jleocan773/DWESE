<?php

/*
    Model: model.editar.php
    Descripción: Muestra un elemento

    Método POST: Cargaré las variables necesarias para mostrar un elemento
*/

//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$id_alumno = $_GET['indice']; // Capturar el ID del alumno desde la URL

//Conectamos a la base de datos
$conexion = new Alumnos();  

//Le metemos los datos
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

$alumno = $conexion->getAlumnoPorId($id_alumno);