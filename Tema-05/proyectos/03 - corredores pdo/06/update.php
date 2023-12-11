<?php

    /*
        Controlador Update
    */

    # Cargamos configuración
    include('config/db.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.corredores.php');
    include('class/class.corredor.php');
    include('class/class.categoria.php');
    include('class/class.club.php');

    # Cargo modelo
    include('models/model.update.php');

    # Cargo vista
    header('location: index.php');

?>