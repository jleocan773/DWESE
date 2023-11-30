<?php

    /*
        Controlador ordenar 
    */

    # Cargamos configuración
    include('config/db.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.alumnos.php');
    include('class/class.alumno.php');

    # Cargo modelo
    include('models/model.ordenar.php');

    # Cargo vista
    header('location: index.php');

?>