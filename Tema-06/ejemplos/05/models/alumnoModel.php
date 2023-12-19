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

    public function create(classAlumno $alumno)
    {
        try {

            # Prepare o plantilla sql
            $sql = "
                INSERT INTO Alumnos(
                    nombre,
                    apellidos,
                    email,
                    telefono,
                    poblacion,
                    dni,
                    fechaNac,
                    id_curso
                ) VALUES (
                    :nombre,
                    :apellidos,
                    :email,
                    :telefono,
                    :poblacion,
                    :dni,
                    :fechaNac,
                    :id_curso
                    )            
            ";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->email, PDO::PARAM_STR, 13);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT, 10);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $e) {
            include_once('template/partials/error.php');
        }
    }

    public function read($id_alumno)
    {
        try {
            $sql = "SELECT * FROM alumnos WHERE id = :id_alumno";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Creamos un objeto pdostatement
            $pdostmt = $conexion->prepare($sql);

            //Vincular los parámetros con valores
            $pdostmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }
}
