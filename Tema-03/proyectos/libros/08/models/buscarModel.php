<?php

/*
    Modelo: buscarModel.php
    Descripción: Busca según criterio

    Método GET: -expresión: prompt o expresión de búsqueda

*/


// Cargar la tabla
$libros = generar_tabla();

// Expresión de búsqueda
$expresión = $_GET['expresion'];

// Filtrar la tabla a partir de esa expresión
$aux = [];

foreach ($libros as $libro) {
    if (array_search($expresión, $libro, false)) {
        $aux[] = $libro;
    }
}   

// Validar la búsqueda
if(!empty($aux)) {
    $libros = $aux;
}
