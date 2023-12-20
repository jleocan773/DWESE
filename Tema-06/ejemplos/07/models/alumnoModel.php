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

    public function update(int $id, classAlumno $alumno)
    {
        try {
            // Creamos la consulta a ejecutar
            $sql = "UPDATE fp.alumnos SET 
            nombre = :nombre, 
            apellidos = :apellidos, 
            email = :email, 
            telefono = :telefono, 
            direccion = :direccion, 
            poblacion = :poblacion, 
            provincia = :provincia, 
            nacionalidad = :nacionalidad, 
            dni = :dni, 
            fechaNac = :fechaNac, 
            id_curso = :id_curso 
            WHERE alumnos.id = :id
            LIMIT 1";

            // Preparamos la consulta
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las variables
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_INT);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 60);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad);
            $pdostmt->bindParam(':dni', $alumno->dni);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

            // Ejecutamos la sentencia
            $pdostmt->execute();
        } catch (PDOException $e) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }

    public function order(int $criterioOrdenacion)
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
            ORDER BY :criterioOrdenacion";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //bindParam para que no se pueda introducir código en criterio
            $pdostmt->bindParam(':criterioOrdenacion', $criterioOrdenacion, PDO::PARAM_INT);

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

    public function filter($expresion)
    {
        try {
            $sql = "

            SELECT 
                alumnos.id,
                concat_ws(', ', alumnos.apellidos, alumnos.nombre) nombre,
                alumnos.email,
                alumnos.telefono,
                alumnos.poblacion,
                alumnos.dni,
                timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                cursos.nombreCorto curso
            FROM
                alumnos
            INNER JOIN
                cursos
            ON 
                alumnos.id_curso = cursos.id
            WHERE

                CONCAT_WS(  ', ', 
                            alumnos.id,
                            alumnos.nombre,
                            alumnos.apellidos,
                            alumnos.email,
                            alumnos.telefono,
                            alumnos.poblacion,
                            alumnos.dni,
                            TIMESTAMPDIFF(YEAR, alumnos.fechaNac, now()),
                            alumnos.fechaNac,
                            cursos.nombreCorto,
                            cursos.nombre) 
                like :expresion

            ORDER BY 
                alumnos.id
            
            ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;
        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }
}
