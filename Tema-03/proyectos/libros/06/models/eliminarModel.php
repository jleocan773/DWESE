<?php

/*
    Modelo: eliminarModel.php
    Descripción: Elimina un libro según su id
    Método GET: - id  del libro que quiero eliminar

*/

$id = $_GET['id'];


//Si elimino el libro cuyo índice es 0, dará un error a la hora de acceder a él
$indice_eliminar = buscar_en_tabla($libros, 'id', $id);

if ($indice_eliminar !== false) {
   //Elimino el libro cuyo índice he buscado arriba
   unset($libros[$indice_eliminar]);
   //Tengo que reordenar el array para que no haya posiciones vacías y haya errores
   $libros = array_values($libros);
} else {
   echo 'Error: libro no encontrado';
   exit();
}
