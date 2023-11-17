<?php

    /*

        Modelo: model.create.php
        Descripcion: añade un nuevo alumno a la tabla

        Método POST:
                    - id
                    - nombre
                    - apellidos
                    - email
                    - fecha nacimiento
                    - curso (mostrado como índice)
                    - asignaturas (mostrado como array)

    */

    //Cargamos los arrays a partir de los métodos estáticos de la clase
    $asignaturas = ArrayAlumnos::getAsignatura();
    $cursos = ArrayAlumnos::getCursos();

    //Pero para los alumnos tenemos que crear una clase porque el método no es static
    $alumnos = new ArrayAlumnos();

    //Le metemos los datos
    $alumnos -> getAlumnos();

    //Adquiero los valores del formulario de model.nuevo.php
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $cursoNuevoAlumno = $_POST['curso'];
    $asignaturasNuevoAlumno = $_POST['asignaturas'];

    //Creo un Objeto de Clase Articulo a partir de los detalles del formulario

    $nuevoAlumno = new Alumno (
        $id,
        $nombre,
        $apellidos,
        $email,
        $fecha_nacimiento,
        $cursoNuevoAlumno,
        $asignaturasNuevoAlumno
);

    //Añadimos el alumno a la tabla
    $alumnos -> create($nuevoAlumno);

    //Generar notificacion
    $notificacion = "Alumno creado correctamente";

?>