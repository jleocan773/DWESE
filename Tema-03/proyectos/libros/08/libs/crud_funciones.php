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


        Funciones: generar_tabla()
        Descripción: Genera tabla de datos con los que vamos a trabajar
        Salida: 
            - Tabla 

*/


function generar_tabla(){
    $tabla = [
        [
            'id' => 1,
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'genero' => 'Novela',
            'precio' => 22.99
        ],
        [
            'id' => 2,
            'titulo' => 'Harry Potter y la piedra filosofal',
            'autor' => 'J.K. Rowling',
            'genero' => 'Fantasía',
            'precio' => 14.99
        ],
        [
            'id' => 3,
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'genero' => 'Ciencia Ficción',
            'precio' => 16.50
        ],
        [
            'id' => 4,
            'titulo' => 'El Principito',
            'autor' => 'Antoine de Saint-Exupéry',
            'genero' => 'Literatura Infantil',
            'precio' => 10.25
        ],

        [
            'id' => 5,
            'titulo' => 'La Sombra del Viento',
            'autor' => 'Carlos Ruiz Zafón',
            'genero' => 'Misterio',
            'precio' => 16.75
        ],
        [
            'id' => 6,
            'titulo' => 'Matar a un ruiseñor',
            'autor' => 'Harper Lee',
            'genero' => 'Drama',
            'precio' => 14.20
        ],
        [
            'id' => 7,
            'titulo' => 'Los juegos del hambre',
            'autor' => 'Suzanne Collins',
            'genero' => 'Ciencia Ficción',
            'precio' => 12.95
        ],
        [
            'id' => 8,
            'titulo' => 'Crimen y castigo',
            'autor' => 'Fyodor Dostoevsky',
            'genero' => 'Clásico',
            'precio' => 19.80
        ],

        [
            'id' => 9,
            'titulo' => 'El Hobbit',
            'autor' => 'J.R.R. Tolkien',
            'genero' => 'Fantasía',
            'precio' => 15.30
        ],
        [
            'id' => 10,
            'titulo' => 'El Código Da Vinci',
            'autor' => 'Dan Brown',
            'genero' => 'Misterio',
            'precio' => 18.99
        ]
    ];

    return $tabla;
}



