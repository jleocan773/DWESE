<?php

    /*
        albumModel.php

        Modelo del  controlador albumes

        Definir los métodos de acceso a la base de datos
        
        - insert
        - update
        - select
        - delete
        - etc..
    */

    class albumModel extends Model {

        /*
            Extrae los detalles  de los albumes
        */
        public function get() {

            try {

                # comando sql
                $sql = "
                SELECT 
                    albumes.id,
                    concat_ws(', ', albumes.apellidos, albumes.nombre) alumno,
                    albumes.email,
                    albumes.telefono,
                    albumes.poblacion,
                    albumes.dni,
                    timestampdiff(YEAR,  albumes.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    albumes
                INNER JOIN
                    cursos
                ON 
                    albumes.id_curso = cursos.id
                ORDER BY 
                    id
                ";

                # conectamos con la base de datos

                // $this->db es un objeto de la clase database
                // ejecuto el método connect de esa clase

                $conexion = $this->db->connect();

                # ejecutamos mediante prepare
                $pdost = $conexion->prepare($sql);

                # establecemos  tipo fetch
                $pdost->setFetchMode(PDO::FETCH_OBJ);

                #  ejecutamos 
                $pdost->execute();

                # devuelvo objeto pdostatement
                return $pdost;

            } catch (PDOException $e) {

                include_once('template/partials/errorDB.php');
                exit();

            }
        }

        public function getCursos() {

            try {
                # Plantilla
                $sql = "
                
                    SELECT 
                            id,
                            nombreCorto curso
                    FROM 
                            cursos
                    ORDER BY 
                            nombreCorto

                ";

                # Conectar con la base de datos
                $conexion = $this->db->connect();

                # ejecutar PREPARE
                $result = $conexion->prepare($sql);

                # establezco com quiero que devuelva el resultado
                $result->setFetchMode(PDO::FETCH_OBJ);

                # ejecuto
                $result->execute();

                return $result;


            } catch (PDOException $e){

                include_once('template/partials/errorDB.php');
                exit();
                
            }


        }

        public function create(classAlumno $alumno) {

            try {
            $sql = "
                    INSERT INTO albumes (
                        nombre,
                        apellidos,
                        email,
                        telefono,
                        poblacion,
                        dni,
                        fechaNac,
                        id_curso
                    )
                    VALUES (
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
             # Conectar con la base de datos
             $conexion = $this->db->connect();

             $pdoSt = $conexion->prepare($sql);
 
             $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
             $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
             $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
             $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 13);
             $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
             $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
             $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
             $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);
 
             $pdoSt->execute();

         }  catch (PDOException $e) {
             include_once('template/partials/errorDB.php');
             exit();
         }

        }

        public function read($id) {

            try {
                $sql ="
                        SELECT 
                                id,
                                nombre, 
                                apellidos,
                                email,
                                telefono,
                                poblacion,
                                dni,
                                fechaNac,
                                id_curso
                        FROM 
                                albumes
                        WHERE
                                id = :id
                ";

                # Conectar con la base de datos
                $conexion = $this->db->connect();

    
                $pdoSt = $conexion->prepare($sql);
    
                $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
                $pdoSt->setFetchMode(PDO::FETCH_OBJ);
                $pdoSt->execute();
                
                return $pdoSt->fetch();
    
            } catch (PDOException $e) {
                include_once('template/partials/errorDB.php');
                exit();
            }

        }

        public function update(classAlumno $alumno, $id) {

            try {

                $sql = "
                
                UPDATE albumes
                SET
                        nombre = :nombre,
                        apellidos = :apellidos,
                        email = :email,
                        telefono = :telefono,
                        poblacion = :poblacion,
                        dni = :dni,
                        fechaNac = :fechaNac,
                        id_curso = :id_curso
                WHERE
                        id = :id
                LIMIT 1
                ";

                $conexion = $this->db->connect();
                
                $pdoSt = $conexion->prepare($sql);

                $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

                $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
                $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
                $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
                $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
                $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
                $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
                $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
                $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

                $pdoSt->execute();

        }
        catch(PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

        }

         /*
            Extrae los detalles  de los albumes
        */
        public function order(int $criterio) {

            try {

                # comando sql
                $sql = "
                SELECT 
                    albumes.id,
                    concat_ws(', ', albumes.apellidos, albumes.nombre) alumno,
                    albumes.email,
                    albumes.telefono,
                    albumes.poblacion,
                    albumes.dni,
                    timestampdiff(YEAR,  albumes.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    albumes
                INNER JOIN
                    cursos
                ON 
                    albumes.id_curso = cursos.id
                ORDER BY 
                    :criterio
                ";

                # conectamos con la base de datos

                // $this->db es un objeto de la clase database
                // ejecuto el método connect de esa clase

                $conexion = $this->db->connect();

                # ejecutamos mediante prepare
                $pdost = $conexion->prepare($sql);

                $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

                # establecemos  tipo fetch
                $pdost->setFetchMode(PDO::FETCH_OBJ);

                #  ejecutamos 
                $pdost->execute();

                # devuelvo objeto pdostatement
                return $pdost;

            } catch (PDOException $e) {

                include_once('template/partials/errorDB.php');
                exit();

            }
        }

        public function filter($expresion) {
            try {
                $sql = "

                SELECT 
                    albumes.id,
                    concat_ws(', ', albumes.apellidos, albumes.nombre) alumno,
                    albumes.email,
                    albumes.telefono,
                    albumes.poblacion,
                    albumes.dni,
                    timestampdiff(YEAR,  albumes.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    albumes
                INNER JOIN
                    cursos
                ON 
                    albumes.id_curso = cursos.id
                WHERE

                    CONCAT_WS(  ', ', 
                                albumes.id,
                                albumes.nombre,
                                albumes.apellidos,
                                albumes.email,
                                albumes.telefono,
                                albumes.poblacion,
                                albumes.dni,
                                TIMESTAMPDIFF(YEAR, albumes.fechaNac, now()),
                                albumes.fechaNac,
                                cursos.nombreCorto,
                                cursos.nombre) 
                    like :expresion

                ORDER BY 
                    albumes.id
                
                ";

                # Conectar con la base de datos
                $conexion = $this->db->connect();

                $pdost = $conexion->prepare($sql);
                
                $pdost->bindValue(':expresion', '%'.$expresion.'%', PDO::PARAM_STR);
                $pdost->setFetchMode(PDO::FETCH_OBJ);
                $pdost->execute();
                return $pdost;

            } catch (PDOException $e){

                include_once('template/partials/errorDB.php');
                exit();
                
            }

    } 

    # Validación email único
    public function validateUniqueEmail($email) {
        try {

            $sql = " 

                SELECT * FROM albumes 
                WHERE email = :email
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':email', $email, PDO::PARAM_STR);
            $pdost->execute();

            if ($pdost->rowCount() != 0) {
                return FALSE;
            }

            return TRUE;


        } catch(PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    # Validación dni único
    public function validateUniqueDNI($dni) {
        try {

            $sql = " 

                SELECT * FROM albumes 
                WHERE dni = :dni
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':dni', $dni, PDO::PARAM_STR);
            $pdost->execute();

            if ($pdost->rowCount() != 0) {
                return FALSE;
            }

            return TRUE;


        } catch(PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

     # Validación curso
     public function validateCurso($id_curso) {
        try {

            $sql = " 

                SELECT * FROM cursos 
                WHERE id = :id_curso
            
            ";

            # conectamos con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
            $pdost->execute();

            if ($pdost->rowCount() == 1) {
                return TRUE;
            }

            return FALSE;


        } catch(PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function delete($id)  {
        try {

            $sql = "DELETE FROM albumes WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

        } catch (PDOException $e) {
            
            include_once('template/partials/errorDB.php');
            exit();
            
        }
    }




    }  

?>