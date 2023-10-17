<?php

/*


        Funciones: eliminar()
        Descripción: Elimina un elemento de la tabla
        Parámetros:
            - Tabla
            - Id del elemento que deseo eliminar
        Salida: 
            - Tabla actualizada

    */

function eliminar(&$tabla = [], $id)
{
    //Buscar elemento en la tabla con el id proporcionado
    $indice = array_search($id, array_column($tabla, 'id'));

    //Se elimina de la tabla el elemento con ese indice
    unset($tabla[$indice]);

    //Se reordenan los indices  para que no haya elemento vacío
    $tabla = array_values($tabla);
}
