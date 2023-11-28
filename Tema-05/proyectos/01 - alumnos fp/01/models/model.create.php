<?php

/*
    Model: model.create.php
    Descripción: Añade un nuevo elemento

    Método POST: Cargaré las variables necesarias para añadir un nuevo elemento
*/


//Creamos una instancia de la Clase Fp
$db = new Fp;

//Le metemos los datos
$alumnosfp = $db->getAlumnos();
$cursosfp = $db->getCursos();

//Tomamos los valores del formulario

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$poblacion = $_POST['poblacion'];
$provincia = $_POST['provincia'];
$nacionalidad = $_POST['nacionalidad'];
$dni = $_POST['dni'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$curso = $_POST['curso'];


//Con el método crearAlumno creamos el alumno a partir de los detalles del formulario
$db->crearAlumno($nombre, $apellidos, $email, $telefono, $direccion, $poblacion, $provincia, $nacionalidad, $dni, $fecha_nacimiento, $curso);

//Generar notificacion
$notificacion = "Alumno creado correctamente";
