<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */

// Conectamos a la base de datos 
$conexion = new Libros();

//Creamos una variable para los campos dinámicos
$autores = $conexion->getAutores();
$editoriales = $conexion->getEditoriales();

?>