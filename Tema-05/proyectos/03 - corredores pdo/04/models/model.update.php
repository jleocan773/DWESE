<?php

/*

        Modelo Update

*/

//Pillamos el id del elemento que se va a editar a través de la variable indice del index
$id_corredor = $_GET['id']; // Capturar el ID del corredor desde la URL

//Conectamos a la base de datos Maratoon
$conexion = new Corredores();

//Creamos las variables categorias y clubs que pillará las categorías y clubs de la tabla con sus métodos correspondientes para generar dinámicamente el formulario
$categorias = $conexion->getCategorias();
$clubs = $conexion->getClubs();

//Pillamos el corredor a editar mediante su id con un método
$corredor_editar = $conexion->getCorredorPorID($id_corredor);

//Tomamos los valores del formulario
$editar_nombre = $_POST['nombre'];
$editar_apellidos = $_POST['apellidos'];
$editar_ciudad = $_POST['ciudad'];
$editar_fechaNacimiento = $_POST['fechaNacimiento'];
$editar_sexo = $_POST['sexo'];
$editar_email = $_POST['email'];
$editar_dni = $_POST['dni'];
$editar_edad = $_POST['edad'];
$editar_id_categoria = $_POST['id_categoria'];
$editar_id_club = $_POST['id_club'];


//Creamos al corredor, al que meteremos los datos del formulario
$editar_corredor = new Corredor();
$editar_corredor->nombre = $editar_nombre;
$editar_corredor->apellidos = $editar_apellidos;
$editar_corredor->ciudad = $editar_ciudad;
$editar_corredor->fechaNacimiento = $editar_fechaNacimiento;
$editar_corredor->sexo = $editar_sexo;
$editar_corredor->email = $editar_email;
$editar_corredor->dni = $editar_dni;
$editar_corredor->edad = $editar_edad;
$editar_corredor->id_categoria = $editar_id_categoria;
$editar_corredor->id_club = $editar_id_club;

//Insertamos el corredor editado con el método updateCorredor()
$conexion->updateCorredor($editar_corredor, $id_corredor);
