<?php

    /*
        Clase Fp

        Métodos específicos para BBDD  fp con las tablas
        - Alumnos
        - Cursos
    */

    Class Fp extends Conexion {

        public function insert_curso(Curso $curso){

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
            }
            catch (PDOException $e) {

                include('views/partials/errorDB.php');
                exit();

            }
        }
    }

?>