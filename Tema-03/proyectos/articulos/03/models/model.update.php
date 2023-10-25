<?php

/*
    Modelo: model.update.php
    Descripción: Actualiza los datos de un articulo
    Método POST: -  id
                    descripcion
                    modelo
                    categoria
                    unidades
                    precio


    Método GET: - id
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

//Obtener el índice del artículo que quiero editar
$id_edit = $_GET['id'];

//Obtener los datos del artículo
$indice_articulo_editar = buscar_en_tabla($articulos, 'id', $id_edit);

//Creo un array asociativo con los detalles del artículo modificado

$articulo =[
    'id' => $id,
    'descripcion' => $descripcion,
    'modelo'=> $modelo,
    'categoria'=> $categoria,
    'unidades'=> $unidades,
    'precio'=> $precio
    ];

//Añado el articulo  modificado a la tabla
$articulos[$indice_articulo_editar] = $articulo;