<?php

/*

        Modelo Create

*/

// Conectamos a la base de datos FP
$conexion = new Corredores();

//Creamos las variables categorias y clubs que pillará las categorías y clubs de la tabla con sus métodos correspondientes para generar dinámicamente el formulario
$categorias = $conexion->getCategorias();
$clubs = $conexion->getClubs();

//Tomamos los valores del formulario
$nuevo_nombre = $_POST['nombre'];
$nuevo_apellidos = $_POST['apellidos'];
$nuevo_ciudad = $_POST['ciudad'];
$nuevo_fechaNacimiento = $_POST['fechaNacimiento'];
$nuevo_sexo = $_POST['sexo'];
$nuevo_email = $_POST['email'];
$nuevo_dni = $_POST['dni'];
$nuevo_edad = $_POST['edad'];
$nuevo_id_categoria = $_POST['id_categoria'];
$nuevo_id_club = $_POST['id_club'];


//Creamos al corredor, al que meteremos los datos del formulario
$nuevo_corredor = new Corredor();
$nuevo_corredor->nombre = $nuevo_nombre;
$nuevo_corredor->apellidos = $nuevo_apellidos;
$nuevo_corredor->ciudad = $nuevo_ciudad;
$nuevo_corredor->fechaNacimiento = $nuevo_fechaNacimiento;
$nuevo_corredor->sexo = $nuevo_sexo;
$nuevo_corredor->email = $nuevo_email;
$nuevo_corredor->dni = $nuevo_dni;
$nuevo_corredor->edad = $nuevo_edad;
$nuevo_corredor->id_categoria = $nuevo_id_categoria;
$nuevo_corredor->id_club = $nuevo_id_club;

//Insertamos el nuevo corredor con el método insertCorredor()
$conexion->insertCorredor($nuevo_corredor);
