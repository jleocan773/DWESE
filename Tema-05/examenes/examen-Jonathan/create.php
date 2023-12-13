<?php

/*
        create.php

        Controlador que permite añadir un nuevo libro a la tabla libros de geslibros

*/


//Cargamos configuración
include('config/config.php');

//Cargamos las clases
include("class/class.conexion.php");
include("class/class.libros.php");
include("class/class.libro.php");

//Cargamos el modelo
include("models/model.create.php");

//Cargamos la vista
header('location: index.php');
