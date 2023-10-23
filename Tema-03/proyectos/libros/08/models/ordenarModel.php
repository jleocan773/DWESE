<?php

/*
    Modelo: ordenarModel.php
    Descripción: Ordena según criterio

    Método GET: -criterio por el cuál ordenar
*/

// Cargar la tabla
$libros = generar_tabla();

// Cargo el criterio de ordenación
$criterio = $_GET['criterio'];


//Cargo en un array todos los valores del criterio de ordenación
$aux = array_column($libros, $criterio);

if (!in_array($criterio, array_keys($libros[0]))) {
    echo "ERROR: Criterio de ordenación no encontrado";
    exit();
}

//Función array_multisort (ordena arrays de múltiples dimensiones)
array_multisort($aux, SORT_ASC, $libros);
