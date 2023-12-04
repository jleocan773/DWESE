<?php

    /*

        Modelo Nuevo

    */

    // Conectamos a la base de datos FP
    $conexion = new Alumnos();

    //Creamos una variable alumnos que pillará los cursos de la tabla con el método getCursos, para generar dinámicamente el formulario
    $cursos = $conexion->getCursos();


?>