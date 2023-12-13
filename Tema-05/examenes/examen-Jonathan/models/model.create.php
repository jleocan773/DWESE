<?php

/*
        Modelo create

        Recibe los valores del formulario nuevo libro
        hay que tener en cuenta que he dejado de utilizar algunos campos
    */

// Conectamos a la base de datos FP
$conexion = new Libros();

//Creamos una variable para los campos dinámicos
$autores = $conexion->getAutores();
$editoriales = $conexion->getEditoriales();

//Tomamos los valores del formulario
$nuevo_titulo = $_POST['titulo'];
$nuevo_isbn = $_POST['isbn'];
$nuevo_fecha_edicion = $_POST['fecha_edicion'];
$nuevo_autor = $_POST['autor'];
$nuevo_editorial = $_POST['editorial'];
$nuevo_stock = $_POST['stock'];
$nuevo_precio_coste = $_POST['precio_coste'];
$nuevo_precio_venta = $_POST['precio_venta'];

//Creamos un nuevo libro con estos valores
$nuevo_libro = new Libro(
    null,
    $nuevo_isbn,
    null,
    $nuevo_titulo,
    $nuevo_autor,
    $nuevo_editorial,
    $nuevo_precio_coste,
    $nuevo_precio_venta,
    $nuevo_stock,
    null,
    null,
    $nuevo_fecha_edicion
);

//Insertamos el nuevo libro con el método insertlibro()
$conexion->insertLibro($nuevo_libro);
