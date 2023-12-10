<?php

/*

    Model: model.index.php
    Descripción: Modelo de Index que cargará los corredores

*/

// Conectamos a la base de datos FP
$conexion = new Corredores();

//Creamos una variable corredores que pillará los corredores de la tabla con el método getCorredores
$corredores = $conexion->getCorredores();
