<?php

/*

        Modelo: model.mostrar.php
        Descripcion: Muestra los detalles de un elemento sin edición

        Método GET: indice del elemento que quiero mostrar

    */


//Cargamos los arrays a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignatura();
$cursos = ArrayAlumnos::getCursos();

//Pero para los alumnos tenemos que crear una clase porque el método no es static
$alumnos = new ArrayAlumnos();

//Le metemos los datos
$alumnos->getAlumnos();


// Obtengo el indice del  artículo que deseo mostrar
$indice = $_GET['indice'];


//Pillamos los datos del articulo que queremos mostrar
$alumno = $alumnos->read($indice);

