<?php

/*

        model.create.PHP

        - Añade un elemento a la tabla 

    */

$peliculas = getPeliculas();
$paises = getPaises();
$generos = getGeneros();


$titulo = $_POST['titulo'];
$pais = $_POST['pais'];
$director = $_POST['director'];
$generosSeleccionados = $_POST['generos'];
$año = $_POST['año'];



$pelicula = [
    'id' => 6,
    'titulo' => $titulo,
    'pais' => $pais,
    'director' => $director,
    'generos' => $generosSeleccionados,
    'año' => $año
];


array_push($peliculas, $pelicula);
