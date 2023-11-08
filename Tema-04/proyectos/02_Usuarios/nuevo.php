<?php

    /*

        Controlador: nuevo.php
        Descripción: Muestra un formulario para añadir un nuevo artículo
    */

    // Clases
    include("class/class.articulo.php");
    include("class/class.arrayArticulos.php");
    
    // Librería
    include 'libs/crud_funciones.php';

    // Model
    include 'models/model.nuevo.php';

    // Vista
    include 'views/view.nuevo.php';
