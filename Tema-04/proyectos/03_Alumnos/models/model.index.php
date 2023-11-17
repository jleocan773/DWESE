<?php

    /*

        Modelo: model.index.php
        Descripcion: Genera un array de instancias de Alumnos

    */

    //Cargamos los arrays a partir de los métodos estáticos de la clase
    $asignaturas = ArrayAlumnos::getAsignatura();
    $cursos = ArrayAlumnos::getCursos();

    //Pero para los alumnos tenemos que crear una clase porque el método no es static
    $alumnos = new ArrayAlumnos();

    //Le metemos los datos
    $alumnos -> getAlumnos();
?>