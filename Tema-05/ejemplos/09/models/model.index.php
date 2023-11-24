<?php

    /*

        Modelo Principal index

    */

    # creamos objeto de la clase  curso
    $curso = new Curso();

    # asignamos valores a las propiedades del objeto
    $curso->nombre = "Primero Desarrollo Aplicaciones Multiplataforma";
    $curso->ciclo = "Desarrollo Aplicaciones Multiplataforma";
    $curso->nombreCorto = "1DAM";
    $curso->nivel = "1";

    # Conectamos con la base de datos
    $fp = new Fp();
    $fp->insert_curso($curso);

    echo "curso añadido correctamente";

?>