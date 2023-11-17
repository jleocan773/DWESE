<?php

    /*

        Modelo: model.eliminar.php
        Descripcion: elimina un elemento de la  tabla

        Método GET:
                    - indice del alumno que quiero eliminar

    */

    //Cargamos los arrays a partir de los métodos estáticos de la clase
    $asignaturas = ArrayAlumnos::getAsignatura();
    $cursos = ArrayAlumnos::getCursos();

    //Pero para los alumnos tenemos que crear una clase porque el método no es static
    $alumnos = new ArrayAlumnos();

    //Le metemos los datos
    $alumnos -> getAlumnos();

    // Obtengo el indice del alumno que deseo eliminar
    $indice = $_GET['indice'];

    // Obtengo el índice del alumno que deseo eliminar
    $alumnos -> delete($indice);

    //Generar notificacion
    $notificacion = "Alumno borrado correctamente";



   

?>