<?php

/*

        Modelo: model.buscar.php
        Descripcion: filtra los elementos  a partir de la expresión búsqueda

        Método GET: expresion, que es un prompt o expresión de búsqueda
    */

//Cargamos los arrays a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignatura();
$cursos = ArrayAlumnos::getCursos();

//Pero para los alumnos tenemos que crear una clase porque el método no es static
$alumnos = new ArrayAlumnos();

//Le metemos los datos
$alumnos->getAlumnos();

// Cargo la expresion de búsqueda
$expresion = $_GET['expresion'];

// Filtrar la tabla  a partir de esa expresión
$alumnosFiltrados = $alumnos->filtrar($alumnos, $expresion);