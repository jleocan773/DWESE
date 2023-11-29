<?php

/*
        Clase Alumnos para la tabla alumnos de la base de datos

        Métodos específicos para BBDD fp con las tablas
        - Alumnos
        - Cursos
    */

class Alumnos extends Conexion
{



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
        cursos.nombreCorto AS curso
        FROM
        alumnos
            INNER JOIN
        cursos ON alumnos.id_curso = cursos.id
        ORDER BY id";

        //Preparamos el statement con un Objeto de la clase PDOstatement
        $pdostmt = $this->pdo->prepare($sql);

        //Establecemos tipo de fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        //Se ejecuta
        $pdostmt->execute();

        //Devolvemos el objeto que ahora será de tipo pdostatement
        return $pdostmt;
    }
    public function insert_curso(Curso $curso)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    ) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                
                ";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
            $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_INT, 1);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function getCursos()
    {

        //Creamos la query de SQL
        $sql = "SELECT 
        id,
        nombreCorto AS curso
        FROM 
        fp.cursos
        ORDER BY id";

        //Preparamos el statement con un Objeto de la clase PDOstatement
        $pdostmt = $this->pdo->prepare($sql);

        //Establecemos tipo de fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        //Se ejecuta
        $pdostmt->execute();

        //Devolvemos el objeto que ahora será de tipo pdostatement
        return $pdostmt;
    }

    public function insert_alumno(Alumno $alumno)
    {
        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Alumnos VALUES (
                        null,
                        :nombre,
                        :apellidos,
                        :email,
                        :telefono,
                        :direccion,
                        :poblacion,
                        :provincia,
                        :nacionalidad,
                        :dni,
                        :fechaNac,
                        :id_curso
                    )
                
                ";

                echo "SQL: $sql";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT, 10);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();
        }
    }
}
