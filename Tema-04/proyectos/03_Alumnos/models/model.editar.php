<?php

/*

        Modelo: model.editar.php
        Descripcion: Edita los detalles de un elemento

        Método GET: indice del elemento que quiero editar

*/

//Cargamos los arrays a partir de los métodos estáticos de la clase
$asignaturas = ArrayAlumnos::getAsignatura();
$cursos = ArrayAlumnos::getCursos();

//Pero para los alumnos tenemos que crear una clase porque el método no es static
$alumnos = new ArrayAlumnos();

//Le metemos los datos
$alumnos->getAlumnos();


// Obtengo el indice del  artículo que deseo editar
$indice = $_GET['indice'];


//Pillamos los datos del articulo que queremos editar
$alumno = $alumnos->read($indice);
