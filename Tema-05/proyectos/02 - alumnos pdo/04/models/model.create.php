<?php

/*
    Model: model.create.php
    Descripción: Añade un nuevo elemento

    Método POST: Cargaré las variables necesarias para añadir un nuevo elemento
*/


//Conectamos a la base de datos
$conexion = new Alumnos();


//Le metemos los datos
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

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
$fechaNac = $_POST['fechaNac'];
$id_curso = $_POST['id_curso'];

$alumno = new Alumno();
$alumno->nombre = $nombre;
$alumno->apellidos = $apellidos;
$alumno->email = $email;
$alumno->telefono = $telefono;
$alumno->direccion = $direccion;
$alumno->poblacion = $poblacion;
$alumno->provincia = $provincia;
$alumno->nacionalidad = $nacionalidad;
$alumno->dni = $dni;
$alumno->fechaNac = $fechaNac;
$alumno->id_curso = $id_curso;


print_r($alumno);
//Con el método crearAlumno creamos el alumno a partir de los detalles del formulario
$conexion->insert_alumno($alumno);

//Generar notificacion
$notificacion = "Alumno creado correctamente";
