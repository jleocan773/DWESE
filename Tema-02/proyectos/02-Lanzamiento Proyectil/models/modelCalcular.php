<?php

    /*
        Modelo: modelsCalcular.php
        Descripción: Cálculos para el Lanzamiento de Proyectil

    */

    //Para pillar el valor de lo que introduce el usuario usamos el método por el que se obtiene y el nombre del campo "name"
    $angulo = $_POST["angulo"];
    $velini = $_POST["velini"];
    define("gravedad", 9.81);

    //Variable para el tipo de operación y para guardar el resultado
    $anguloRadianes = deg2rad($angulo);
	$velinix = $velini * cos($anguloRadianes);
    $veliniy = $velini * sin($anguloRadianes);
    $alcancemaximo = ($velinix * 2 * $veliniy) / gravedad;
    $tiempoproyectil = (2 * $veliniy) / gravedad;
    $alturamaxima = ($veliniy * $veliniy) / (2 * gravedad);


?>