<?php

/*

    Model: model.eliminar.php
    Descripción: Elimina un elemento

    Método POST: Cargaré la id del elemento a eliminar

*/

//Pillamos el id del elemento que se va a eliminar a través de la variable indice del index
$id_corredor = $_GET['id']; // Capturar el ID del corredor desde la URL

//Conectamos a la base de datos Maratoon
$conexion = new Corredores();

//Pillamos el corredor a eliminar mediante su id con un método
$conexion->deleteCorredor($id_corredor);
