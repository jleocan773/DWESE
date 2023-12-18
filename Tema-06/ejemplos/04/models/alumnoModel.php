<?php

/*
        alumnoModel.php

        Modelo del controlador alumnos

        Definir los métodos de acceso a la base de datos

        - insert
        - update
        - select
        - delete
        - etc
    
        */

class alumnoModel extends Model
{

    /*
            Extrae los detalles de los alumnos
        */

    public function get()
    {
        try {
            //Sentencia SQL
            $sql = "SELECT 
            alumnos.id,
            concat_ws(', ', alumnos.nombre, alumnos.apellidos) AS nombre,
            alumnos.email,
            alumnos.telefono,
            alumnos.poblacion,
            alumnos.dni,
            TIMESTAMPDIFF(YEAR, alumnos.fechaNac, NOW()) AS edad,
            cursos.nombreCorto AS curso
            FROM
                alumnos
            INNER JOIN
                cursos ON alumnos.id_curso = cursos.id
            ORDER BY id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $e) {
            include_once('template/partials/error.php');
        }
    }

    public function getCursos()
    {
        try {

            //Creamos la query de SQL
            $sql = "SELECT 
            id,
            nombreCorto AS curso
            FROM 
            fp.cursos
            ORDER BY id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $e) {
            include_once('template/partials/error.php');
        }
    }
}
