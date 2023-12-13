<?php

/*  
        model.ordenar.php

    */

//Pillamos el criterio
$criterio_ordenacion = $_GET['criterio'];

// Conectamos a la base de datos 
$conexion = new Libros();

//Creamos una variable para los campos dinámicos
$autores = $conexion->getAutores();
$editoriales = $conexion->getEditoriales();

//Ordenamos los libros con el método orderLibros()
$libros = $conexion->orderLibros($criterio_ordenacion);

