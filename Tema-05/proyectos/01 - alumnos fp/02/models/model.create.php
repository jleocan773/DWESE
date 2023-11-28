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
$alumno->fecha_nacimiento = $fecha_nacimiento;
$alumno->curso = $curso;

//Con el método crearAlumno creamos el alumno a partir de los detalles del formulario
$db->crearAlumno($alumno);

//Generar notificacion
$notificacion = "Alumno creado correctamente";
