<?php

    /*
        Controlador Ordenar
    */

    # Cargamos configuración
    include('config/db.php');

    # Cargamos librería de funciones

    # Cargamos clases en orden
    include('class/class.conexion.php');
    include('class/class.corredores.php');

    # Cargo modelo
    include('models/model.ordenar.php');

    # Cargo vista
    include('views/view.index.php');

?>