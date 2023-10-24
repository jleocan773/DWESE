<?php



function generar_tabla_articulos(){
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

function generar_tabla_categorias(){

    $categorias = [
        'PC sobremesa',
        'Portátiles',
        'Componentes',
        'Pantallas',
        'Impresoras',
        'Tablets',
        'Móviles'
    ];
    
    return $categorias;

}