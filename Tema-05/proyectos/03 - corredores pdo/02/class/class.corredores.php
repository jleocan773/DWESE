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

    public function insertCorredor(Corredor $data)
    {
        try {

            //Prepare o plantilla sql
            $sql = "
                    INSERT INTO Corredores VALUES (
                        null,
                        :nombre,
                        :apellidos,
                        :ciudad,
                        :fechaNacimiento,
                        :sexo,
                        :email,
                        :dni,
                        :edad,
                        :id_categoria,
                        :id_club
                    )
                
                ";

            //Preparamos el pdostmt
            $pdostmt = $this->pdo->prepare($sql);

            //Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $data->nombre, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':apellidos', $data->apellidos, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':ciudad', $data->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $data->fechaNacimiento, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':sexo', $data->sexo, PDO::PARAM_STR, 1);
            $pdostmt->bindParam(':email', $data->email, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':dni', $data->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':edad', $data->edad, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':id_categoria', $data->id_categoria, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':id_club', $data->id_club, PDO::PARAM_INT, 10);

            //Ejecutamos sql
            $pdostmt->execute();

            //Liberamos objeto 
            $pdostmt = null;

            //Cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();
        }
    }


    public function getCategorias()
    {
        //Creamos la query de SQL
        $sql = "SELECT 
        id,
        nombre
        FROM maratoon.categorias
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

    public function getClubs()
    {
        //Creamos la query de SQL
        $sql = "SELECT 
        id,
        nombre
        FROM maratoon.clubs
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
}
