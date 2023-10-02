<?php

    /*
        Modelo: resta.php
        Descripción: Resta dos valores

    */

    //Para pillar el valor de lo que introduce el usuario usamos el método por el que se obtiene y el nombre del campo "name"
    $valor1 = $_POST["valor1"];
    $valor2 = $_POST["valor2"];

    //Variable para el tipo de operación y para guardar el resultado
    $operacion = "Resta";
    $resultado = $valor1 - $valor2;


?>