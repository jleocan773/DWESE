<?php

/*
    Modelo: createModel.php
    Descripción: Añade un nuevo articulo a la tabla
    Método POST: -  $id
                    $descripcion 
                    $modelo
                    $categoria 
                    $unidades 
                    $precio 
*/

// Cargar la tabla
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

//Extraremos las variables del formulario
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];


//Creo un array asociativo con los detalles del nuevo articulo

$articulo = [
    'id' => $id,
    'descripcion' => $descripcion,
    'modelo' => $modelo,
    'categoria' => $categoria,
    'unidades' => $unidades,
    'precio' => $precio
];

//Añado el articulo a la tabla
array_push($articulos, $articulo);

// array_push hace esto -> $articulos[] = $articulo;