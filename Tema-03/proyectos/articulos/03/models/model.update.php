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


//Obtener el índice del artículo que quiero editar
$id_edit = $_GET['id'];

//Obtener los datos del artículo
$indice_articulo_editar = buscar_en_tabla($articulos, 'id', $id_edit);

$articulos = actualizar($articulos, $indice_articulo_editar);