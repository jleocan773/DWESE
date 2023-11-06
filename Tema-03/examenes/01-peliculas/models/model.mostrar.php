<?php

/*

        Modelo: model.mostrar.PHP

        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */



$peliculas = getPeliculas();
$paises = getPaises();
$generos = getGeneros();


$indicePelicula = $_GET['indice'];
$peliculaSeleccionada = $peliculas[$indicePelicula];

$pelicula = [
    'id' => $peliculaSeleccionada['id'],
    'titulo' => $peliculaSeleccionada['titulo'],
    'pais' => $paises[$peliculaSeleccionada['pais']],
    'director' => $peliculaSeleccionada['director'],
    'generos' => mostrarGeneros($generos, $peliculaSeleccionada['generos']),
    'año' => $peliculaSeleccionada['año']
];
