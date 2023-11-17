<?php

    /*

        Modelo: model.nuevo.php
        Descripcion: Carga arrays para poder generar dinámicante un nuevo formulario

    */

    //Cargamos los arrays a partir de los métodos estáticos de la clase
    $asignaturas = ArrayAlumnos::getAsignatura();
    $cursos = ArrayAlumnos::getCursos();

?>