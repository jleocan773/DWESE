<?php

/*
    Modelo: updateModel.php
    Descripción: Actualiza los datos de un libro
    Método POST: -  id
                    titulo
                    autor
                    genero
                    precio


    Método GET: - id
*/

// Cargar la tabla
$libros = generar_tabla();

//Extraremos las variables del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

//Obtener el índice del libro que quiero editar
$id_edit = $_GET['id'];

//Obtener los datos del libro
$indice_libro_editar = buscar_en_tabla($libros, 'id', $id_edit);

//Creo un array asociativo con los detalles del libro modificado

$libro =[
    'id' => $id,
    'titulo' => $titulo,
    'autor'=> $autor,
    'genero'=> $genero,
    'precio'=> $precio
    ];

//Añado el libro modificado a la tabla
$libros[$indice_libro_editar] = $libro;
