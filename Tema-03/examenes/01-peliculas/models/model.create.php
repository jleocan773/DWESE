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
$generos = $_POST['generos'];
$año = $_POST['año'];



$pelicula = [
    'id' => 6,
    'titulo' => $titulo,
    'pais' => $pais,
    'director' => $director,
    'generos' => $generos,
    'año' => $año
];


$peliculas = array_push($peliculas, $pelicula);
