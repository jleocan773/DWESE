<?php

/*
    Modelo: model.nuevo.php
    Descripcion: Cargo lo necesario para poder generar dinámicante un nuevo formulario
*/

//Creamos una instancia de la Clase Fp
$db = new Fp;

//Le metemos los datos
$alumnosfp = $db->getAlumnos();
$cursosfp = $db->getCursos();
