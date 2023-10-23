<?php

/*
    Modelo: createModel.php
    Descripción: Añade un nuevo libro a la tabla
    Método POST: -  id
                    titulo
                    autor
                    genero
                    precio
*/

// Cargar la tabla
$libros = generar_tabla();

//Extraremos las variables del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];


//Creo un array asociativo con los detalles del nuevo libro

$libro =[
    'id' => $id,
    'titulo' => $titulo,
    'autor'=> $autor,
    'genero'=> $genero,
    'precio'=> $precio
    ];

//Añado el libro a la tabla
array_push($libros, $libro);

// array_push hace esto -> $libros[] = $libro;