<?php

/*
    Model: model.eliminar.php
    Descripción: Elimina un elemento

    Método POST: Cargaré las variables necesarias para eliminar un elemento
*/

//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$id_alumno = $_GET['indice']; // Capturar el ID del alumno desde la URL

//Conectamos a la base de datos
$conexion = new Alumnos();  

//Le metemos los datos
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

$alumno = $conexion->getAlumnoPorId($id_alumno);

//Con el método delete_alumno borramos el alumno a partir de los detalles del formulario
$conexion->delete_alumno($id_alumno);

//Generar notificacion
$notificacion = "Alumno eliminado correctamente";
