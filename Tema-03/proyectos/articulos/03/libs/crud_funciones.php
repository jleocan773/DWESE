<?php

function buscar_en_tabla($tabla, $columna, $valor)
{
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);
}

function generar_tabla_articulos()
{
    $tabla = [

        [
            'id' => 1,
            'descripcion' => 'Ordenador de sobremesa HP',
            'modelo' => 'HP Pavilion 500-123es',
            'categoria' => 0, // PC sobremesa
            'unidades' => 10,
            'precio' => 599.99
        ],
        [
            'id' => 2,
            'descripcion' => 'Portátil Dell',
            'modelo' => 'Dell XPS 13',
            'categoria' => 1, // Portátiles
            'unidades' => 15,
            'precio' => 1299.99
        ],
        [
            'id' => 3,
            'descripcion' => 'Tarjeta gráfica NVIDIA',
            'modelo' => 'NVIDIA GeForce RTX 3080',
            'categoria' => 2, // Componentes
            'unidades' => 30,
            'precio' => 799.99
        ],
        [
            'id' => 4,
            'descripcion' => 'Monitor LG',
            'modelo' => 'LG Ultragear 27GL83A-B',
            'categoria' => 3, // Pantallas
            'unidades' => 20,
            'precio' => 349.99
        ],
        [
            'id' => 5,
            'descripcion' => 'Impresora Epson',
            'modelo' => 'Epson EcoTank ET-2750',
            'categoria' => 4, // Impresoras
            'unidades' => 12,
            'precio' => 249.99
        ],
        [
            'id' => 6,
            'descripcion' => 'Tablet Samsung',
            'modelo' => 'Samsung Galaxy Tab S7',
            'categoria' => 5, // Tablets
            'unidades' => 18,
            'precio' => 549.99
        ],
        [
            'id' => 7,
            'descripcion' => 'Teléfono móvil Apple',
            'modelo' => 'iPhone 13 Pro',
            'categoria' => 6, // Móviles
            'unidades' => 25,
            'precio' => 999.99
        ]

    ];

    return $tabla;
}

function generar_tabla_categorias()
{

    $categorias = [
        'Componentes',
        'Impresoras',
        'Móviles',
        'Pantallas',
        'PC sobremesa',
        'Portátiles',
        'Tablets'
    ];

    return $categorias;
}


function eliminar($tabla, $indice)
{
    if (isset($tabla[$indice])) {
        // Elimino el artículo cuyo índice he buscado arriba
        array_splice($tabla, $indice, 1);
    } else {
        echo 'Error: artículo no encontrado';
        exit();
    }

    return $tabla;
}

function actualizar($tabla, $indice_articulo_editar)
{
    //Extraremos las variables del formulario
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $categoria = $_POST['categoria'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];


    //Creo un array asociativo con los detalles del artículo modificado

    $articulo = [
        'id' => $id,
        'descripcion' => $descripcion,
        'modelo' => $modelo,
        'categoria' => $categoria,
        'unidades' => $unidades,
        'precio' => $precio
    ];

    $tabla[$indice_articulo_editar] = $articulo;
    return $tabla;
}

function nuevo($tabla, $registro)
{
    $tabla[] = $registro;
    return $tabla;
}

function ordenar($tabla, $criterio)
{
    //Cargo en un array todos los valores del criterio de ordenación
    $aux = array_column($tabla, $criterio);

    if (!in_array($criterio, array_keys($tabla[0]))) {
        echo "ERROR: Criterio de ordenación no encontrado";
        exit();
    }

    //Función array_multisort (ordena arrays de múltiples dimensiones)
    array_multisort($aux, SORT_ASC, $tabla);

    return $tabla;

}

function ultimoID($tabla){
    $num_elementos = count($tabla);
    $ultimo_id = $tabla[$num_elementos - 1]['id'];
    return $ultimo_id;
}