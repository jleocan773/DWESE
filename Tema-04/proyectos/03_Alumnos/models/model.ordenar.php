<?php

/*

        Modelo: model.ordenar.php
        Descripcion: Muestra los elementos a partir de un criterio de ordenación

        Método GET: critero, que será cualquiera de los campos del elemento
    */

//Cargamos los arrays a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignatura();
$cursos = ArrayAlumnos::getCursos();

//Pero para los alumnos tenemos que crear una clase porque el método no es static
$alumnos = new ArrayAlumnos();

//Le metemos los datos
$alumnos->getAlumnos();

//Pillamos el criterio de ordenación
$criterio = $_GET['criterio']; 

// Ordena los elementos
$alumnos->ordenarAlumnos($criterio);

//Creo una variable con los elementos ordenados
$alumnosOrdenados = $alumnos->tabla;