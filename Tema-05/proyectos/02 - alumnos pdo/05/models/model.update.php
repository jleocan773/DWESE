<?php


//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$id_alumno = $_GET['indice']; // Capturar el ID del alumno desde la URL

//Conectamos a la base de datos
$conexion = new Alumnos();  

//Le metemos los datos
$alumnos = $conexion->getAlumnos();
$cursos = $conexion->getCursos();

$alumno = new Alumno();

//Tomamos los valores del formulario
$nombreEditar = $_POST['nombre'];
$apellidosEditar = $_POST['apellidos'];
$emailEditar = $_POST['email'];
$telefonoEditar = $_POST['telefono'];
$direccionEditar = $_POST['direccion'];
$poblacionEditar = $_POST['poblacion'];
$provinciaEditar = $_POST['provincia'];
$nacionalidadEditar = $_POST['nacionalidad'];
$dniEditar = $_POST['dni'];
$fechaNacEditar = $_POST['fechaNac'];
$id_cursoEditar = $_POST['id_curso'];

$alumno->nombre = $nombreEditar;
$alumno->apellidos = $apellidosEditar;
$alumno->email = $emailEditar;
$alumno->telefono = $telefonoEditar;
$alumno->direccion = $direccionEditar;
$alumno->poblacion = $poblacionEditar;
$alumno->provincia = $provinciaEditar;
$alumno->nacionalidad = $nacionalidadEditar;
$alumno->dni = $dniEditar;
$alumno->fechaNac = $fechaNacEditar;
$alumno->id_curso = $id_cursoEditar;


//Con el método crearAlumno creamos el alumno a partir de los detalles del formulario
$conexion->update_alumno($alumno, $id_alumno);

//Generar notificacion
$notificacion = "Alumno editado correctamente";

?>