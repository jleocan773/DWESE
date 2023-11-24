<?php

    /*
        Controlador principal index con PDO
    */

    # Cargamos configuración
    include('config/config.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.curso.php');
    include('class/class.fp.php');

    # Cargo modelo
    include('models/model.index.php');

    # Cargo vista

?>