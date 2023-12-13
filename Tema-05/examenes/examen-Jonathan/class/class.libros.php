    <?php

    /*
        Clase libros 

        Aquí se definirán los métodos necesarios para completar el examen
        
    */

    class Libros extends Conexion
    {


        public function getLibros()
        {

            //Creamos la query de SQL
            $sql = "SELECT 
            libros.id,
            libros.titulo,
            autores.nombre as autor,
            editoriales.nombre as editorial,
            libros.stock as unidades,
            libros.precio_coste as coste,
            libros.precio_venta as pvp
            FROM
            libros
                INNER JOIN
            autores ON libros.autor_id = autores.id
		    	INNER JOIN
		    editoriales ON libros.editorial_id = editoriales.id
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


        public function getAutores()
        {
            //Creamos la query de SQL
            $sql = "SELECT 
            id,
            nombre
            FROM geslibros.autores";

            //Preparamos el statement con un Objeto de la clase PDOstatement
            $pdostmt = $this->pdo->prepare($sql);

            //Establecemos tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Se ejecuta
            $pdostmt->execute();

            //Devolvemos el objeto que ahora será de tipo pdostatement
            return $pdostmt;
        }

        public function getEditoriales()
        {
            //Creamos la query de SQL
            $sql = "SELECT 
            id,
            nombre
            FROM geslibros.editoriales";

            //Preparamos el statement con un Objeto de la clase PDOstatement
            $pdostmt = $this->pdo->prepare($sql);

            //Establecemos tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Se ejecuta
            $pdostmt->execute();

            //Devolvemos el objeto que ahora será de tipo pdostatement
            return $pdostmt;
        }

        public function insertLibro(Libro $data)
        {
            try {
                // Prepare o plantilla sql
                $sql = "
                    INSERT INTO libros (
                        id,
                        isbn,
                        ean,
                        titulo,
                        autor_id,
                        editorial_id,
                        precio_coste,
                        precio_venta,
                        stock,
                        stock_min,
                        stock_max,
                        fecha_edicion,
                        create_at,
                        update_at
                    ) VALUES (
                        NULL,
                        :isbn,
                        NULL,
                        :titulo,
                        :autor_id,
                        :editorial_id,
                        :precio_coste,
                        :precio_venta,
                        :stock,
                        NULL,
                        NULL,
                        :fecha_edicion,
                        NULL,
                        NULL
                    )
                ";

                // Preparamos el pdostmt
                $pdostmt = $this->pdo->prepare($sql);

                // Vincular los parámetros con valores
                $pdostmt->bindParam(':isbn', $data->isbn, PDO::PARAM_STR, 13);
                $pdostmt->bindParam(':titulo', $data->titulo, PDO::PARAM_STR, 80);
                $pdostmt->bindParam(':autor_id', $data->autor_id, PDO::PARAM_INT, 10);
                $pdostmt->bindParam(':editorial_id', $data->editorial_id, PDO::PARAM_INT, 10);
                $pdostmt->bindParam(':precio_coste', $data->precio_coste);
                $pdostmt->bindParam(':precio_venta', $data->precio_venta);
                $pdostmt->bindParam(':stock', $data->stock, PDO::PARAM_INT, 10);
                $pdostmt->bindParam(':fecha_edicion', $data->fecha_edicion);

                // Ejecutamos sql
                $pdostmt->execute();

                // Liberamos objeto
                $pdostmt = null;

                // Cerramos conexión
                $this->pdo = null;
            } catch (PDOException $e) {
                include('views/partials/partial.errorDB.php');
                exit();
            }
        }

        public function orderLibros(int $criterio)
        {
            try {
                // Creamos la query de SQL
                $sql = "SELECT 
                    libros.id,
                    libros.titulo,
                    autores.nombre as autor,
                    editoriales.nombre as editorial,
                    libros.stock as unidades,
                    libros.precio_coste as coste,
                    libros.precio_venta as pvp
                    FROM
                    libros
                    INNER JOIN
                    autores ON libros.autor_id = autores.id
		    	    INNER JOIN
		            editoriales ON libros.editorial_id = editoriales.id
                    ORDER BY :criterio;";

                // Preparamos el statement con un Objeto de la clase PDOstatement
                $pdostmt = $this->pdo->prepare($sql);

                // Vinculamos el valor
                $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

                // Establecemos tipo de fetch
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);

                // Se ejecuta
                $pdostmt->execute();

                // Devolvemos el objeto que ahora será de tipo pdostatement
                return $pdostmt;
            } catch (PDOException $e) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }
    }

    ?>