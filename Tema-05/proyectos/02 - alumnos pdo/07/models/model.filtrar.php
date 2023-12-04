<?php

/*
    Model: model.filtrar.php
    Descripción: Filtra elementos según expresión 

    Método POST: Cargaré la expresión de filtrado
*/

//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$expresion_filtrado = $_GET['expresion'];

//Conectamos a la base de datos
$conexion = new Alumnos();

//Le metemos los datos
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

//Con el método delete_alumno borramos el alumno a partir de los detalles del formulario
$alumnos = $conexion->filtrar_alumnos($expresion_filtrado);
