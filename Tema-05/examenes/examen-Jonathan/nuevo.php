<?php

/*

        nuevo.php

        Controlador que permite acceder a geslibros, extraer la lista de Autores y Editoriales
        y mostrar el formulario que permitirá añadir nuevo libro.

*/

//Cargamos configuración
include('config/config.php');

//Cargamos las clases
include("class/class.conexion.php");
include("class/class.libros.php");
include("class/class.libro.php");

//Cargamos el modelo
include("models/model.nuevo.php");

//Cargamos la vista
include("views/view.nuevo.php");
