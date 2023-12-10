<?php

/*
        Clase Corredos para la tabla corredores de la base de datos

        Métodos específicos para BBDD fp con las tablas
        - Corredos
        - Categorías
        - Clubs
    */

class Corredores extends Conexion
{



    public function getCorredores()
    {

        //Creamos la query de SQL
        $sql = "SELECT 
        corredores.id,
        concat_ws(', ', corredores.nombre, corredores.apellidos) AS nombre,
        corredores.ciudad,
        corredores.fechaNacimiento,
        corredores.sexo,
        corredores.email,
        corredores.dni,
        corredores.edad,
        categorias.nombre as categoria,
        clubs.nombre as club
        FROM
        corredores
            INNER JOIN
        categorias ON corredores.id_categoria = categorias.id
			INNER JOIN
		clubs ON corredores.id_club = clubs.id
        ORDER BY id;";

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
}
