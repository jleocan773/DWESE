<?php

/*
    Modelo: model.eliminar.php
    Descripción: Elimina un articulo según su id
    Método GET: - id  del articulo que quiero eliminar

*/

// Cargar la tabla
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();

$id = $_GET['id'];


//Si elimino el artículo cuyo índice es 0, dará un error a la hora de acceder a él
$indice_eliminar = buscar_en_tabla($articulos, 'id', $id);

if ($indice_eliminar !== false) {
   //Elimino el artículo cuyo índice he buscado arriba
   unset($articulos[$indice_eliminar]);
   //Tengo que reordenar el array para que no haya posiciones vacías y haya errores
   $articulos = array_values($articulos);
} else {
   echo 'Error: artículo no encontrado';
   exit();
}
