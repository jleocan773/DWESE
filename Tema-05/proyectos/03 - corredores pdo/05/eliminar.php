<?php

/*
        Controlador Eliminar
    */

# Cargamos configuración
include('config/db.php');

# Cargamos librería de funciones

# Cargamos clases en orden
include('class/class.conexion.php');
include('class/class.corredores.php');

# Cargo modelo
include('models/model.eliminar.php');

# Cargo vista
header('location: index.php');
