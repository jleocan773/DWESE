<?php

    /*

        Modelo: model.index.php
        Descripcion: Genera un array con los detalles de los alumnos

    */

    //Creamos una instancia de la Clase Fp
    $db = new Fp;

    //Le metemos los datos
    $alumnos= $db->getAlumnos();
?>