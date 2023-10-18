<?php

/*


        Funciones: buscar_en_tabla()
        Descripción: Busca un valor en una determinada columna de una tabla
        Parámetros:
            - Tabla
            - Nombre Columna para hacer la búsqueda
            - Valor a buscar
        Salida: 
            - Tabla actualizada

*/

function buscar_en_tabla($tabla, $columna, $valor) {
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);
}

/*


        Funciones: eliminar()
        Descripción: Elimina un elemento de la tabla
        Parámetros:
            - Tabla
            - Id del elemento que deseo eliminar
        Salida: 
            - Tabla actualizada

*/

// function eliminar(&$tabla = [], $id)
// {

//     //Esto es para comprobar los valores
//     //$lista_id= array_column($tabla, 'titulo');
//     //print_r($lista_id);
//     //exit(0);

//     //Buscar elemento en la tabla con el id proporcionado
//     $indice = array_search($id, array_column($tabla, 'id'));

//     //Si quisieramos mostrar el elemento elminado
//     //$elementoEliminado = array_search($id, array_column($tabla, 'id'));
//     //echo "$elementoEliminado";

//     //Se elimina de la tabla el elemento con ese indice
//     unset($tabla[$indice]);


//     return $tabla;

//     //Se reordenan los indices  para que no haya elemento vacío
//     //$tabla = array_values($tabla);
// }

