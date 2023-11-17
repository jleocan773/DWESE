<?php

/*
        Clase FP

        Métodos necesarios para la gestión de la BBDD fp
        En este caso solo los métodos pertenecientes a la tabla Alumnos
    */


Class Fp extends Conexion
{

    /* getAlumnos

    Devuelve un objeto conjunto resultados (mysqli_result)
    con los detalles de todos los alumnos

    */

    public function getAlumnos()
    {

        //Creamos la query de SQL
        $sql = "SELECT 
        alumnos.id,
        concat_ws(', ', alumnos.nombre, alumnos.apellidos) AS nombre,
        alumnos.email,
        alumnos.telefono,
        alumnos.poblacion,
        alumnos.dni,
        TIMESTAMPDIFF(YEAR, alumnos.fechaNac, NOW()) AS edad,
        cursos.nombreCorto curso
        FROM
        alumnos
            INNER JOIN
        cursos ON alumnos.id_curso = cursos.id
        ORDER BY id";

            $result = $this->db->query($sql);

            return $result;
    }
}
