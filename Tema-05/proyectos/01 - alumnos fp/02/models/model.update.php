<?php

/*

    Modelo: model.update.php
    Descripcion: actualiza los detalles de un  artículo

    Método POST:
                - descripcion
                - modelo
                - marca
                - categorías
                - unidades
                - precio

    Método GET:
                - indice -> índice  del articulo que quiero editar

*/


// Cargar las categorías y crear un Array de Artículos
$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

$articulos = new ArrayArticulos();
$articulos->getDatos();

// Extraer índice del artículo que voy a editar
$indice = $_GET['indice'];

//Creo una variable articulo y hago que tenga los datos del artículo que quiero editar
$articulo = $articulos->read($indice);

// Pillo los detalles del artículo seleccionado que están en el formulario en view.editar.php
$datosArticulo = [
    'descripcion' => $_POST['descripcion'],
    'modelo' => $_POST['modelo'],
    'marca' => $_POST['marca'],
    'categorias' => $_POST['categorias'],
    'unidades' => $_POST['unidades'],
    'precio' => $_POST['precio']
];

// Creo las variables que modificaré con los setter y las igualo con las que tiene el artículo al darle click a editar
$descripcion = $datosArticulo['descripcion'];
$modelo = $datosArticulo['modelo'];
$marca = $datosArticulo['marca'];
$categoriasArt = $datosArticulo['categorias'];
$unidades = $datosArticulo['unidades'];
$precio = $datosArticulo['precio'];

//Con los setter cambio los valores de las variables a lo que haya cambiado en el formulario
$articulo->setDescripcion($descripcion);
$articulo->setModelo($modelo);
$articulo->setMarca($marca);
$articulo->setCategorias($categoriasArt);
$articulo->setUnidades($unidades);
$articulo->setPrecio($precio);

//Añadimos el artículo
$articulos->update($indice, $articulo);

// Generar notificación
$notificacion = "Artículo editado correctamente";
