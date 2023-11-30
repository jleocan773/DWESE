<?php

    /*

        Modelo Principal index

    */

    // Conectamos a la base de datos FP
    $conexion = new Alumnos();

    //Creamos una variable alumnos que pillará los alumnos de la tabla con el método getAlumnos
    $alumnos = $conexion->getAlumnos();


?>