<?php

/*

    Modelo: model.update.php
    Descripcion: Actualiza los detalles de un elemento

    Método POST: Pillo todas los atributos del elemento


    Método GET: Indice  del elemento que quiero editar

*/


//Cargamos los arrays a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignatura();
$cursos = ArrayAlumnos::getCursos();

//Pero para los alumnos tenemos que crear una clase porque el método no es static
$alumnos = new ArrayAlumnos();

//Le metemos los datos
$alumnos->getAlumnos();

// Obtengo el indice del  alumno que deseo editar
$indice = $_GET['indice'];

//Creo una variable alumno y hago que tenga los datos del alumno que quiero editar
$alumno = $alumnos->read($indice);

// Pillo los detalles del alumno seleccionado que están en el formulario en view.editar.php
$datosAlumno = [
    'nombre' => $_POST['nombre'],
    'apellidos' => $_POST['apellidos'],
    'email' => $_POST['email'],
    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
    'curso' => $_POST['curso'],
    'asignaturas' => $_POST['asignaturas']
];

// Creo las variables que modificaré con los setter y las igualo con las que tiene el alumno al darle click a editar
$nombreEdit = $datosAlumno['nombre'];
$apellidosEdit = $datosAlumno['apellidos'];
$emailEdit = $datosAlumno['email'];
$fecha_nacimientoEdit = $datosAlumno['fecha_nacimiento'];
$cursoEdit = $datosAlumno['curso'];
$asignaturasEdit = $datosAlumno['asignaturas'];

//Con los setter cambio los valores de las variables a lo que haya cambiado en el formulario
$alumno->nombre = $nombreEdit;
$alumno->apellidos = $apellidosEdit;
$alumno->email = $emailEdit;
$alumno->fecha_nacimiento = $fecha_nacimientoEdit;
$alumno->curso = $cursoEdit;
$alumno->asignaturas = $asignaturasEdit;

//Añadimos el alumno
$alumnos->update($indice, $alumno);

// Generar notificación
$notificacion = "Alumno editado correctamente";
