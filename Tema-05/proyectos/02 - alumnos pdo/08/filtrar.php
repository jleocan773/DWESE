<?php

    /*
        Controlador filtrar 
    */

    # Cargamos configuración
    include('config/db.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.alumnos.php');

    # Cargo modelo
    include('models/model.filtrar.php');

    # Cargo vista
    include('views/view.index2.php');

?>