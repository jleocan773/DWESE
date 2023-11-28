<?php

/*
        Clase FP

        Métodos necesarios para la gestión de la BBDD fp
        En este caso solo los métodos pertenecientes a la tabla Alumnos
*/


class Fp extends Conexion
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

        //Preparamos el statement
        $stmt = $this->db->prepare($sql);
        //Se ejecuta
        $stmt->execute();
        //Creamos una variable de tipo result que será la salida de la ejecución
        $result = $stmt->get_result();

        return $result;
    }

    public function getCursos()
    {
        $sql = "SELECT 
        id, 
        nombreCorto curso 
        FROM 
        cursos
        ORDER BY id";

        //Preparamos el statement
        $stmt = $this->db->prepare($sql);
        //Se ejecuta
        $stmt->execute();
        //Creamos una variable de tipo result que será la salida de la ejecución
        $result = $stmt->get_result();

        return $result;
    }

    public function crearAlumno(Alumno $alumno)
    {
        $sql = "INSERT INTO alumnos VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssssssssi", 
            $alumno->nombre, 
            $alumno->apellidos, 
            $alumno->email, 
            $alumno->telefono, 
            $alumno->direccion, 
            $alumno->poblacion, 
            $alumno->provincia, 
            $alumno->nacionalidad, 
            $alumno->dni, 
            $alumno->fecha_nacimiento, 
            $alumno->id_curso);

            
        }
        //Ejecutamos el statement
        $stmt->execute();
        //Y lo cerramos
        $stmt->close();
        //Cerramos la conexión
        $this->db->close();
    }
}
