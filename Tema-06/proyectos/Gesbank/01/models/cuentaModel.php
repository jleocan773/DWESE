<?php

/*
        clienteModel.php

        Modelo del controlador cuentas

        Definir los métodos de acceso a la base de datos

        - insert
        - update
        - select
        - delete
        - etc
    
        */

class cuentaModel extends Model
{

    /*
        Extrae los detalles de las cuentas
    */

    public function get()
    {
        try {
            //Sentencia SQL
            $sql = "SELECT * from gesbank.cuentas";

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
            exit();
        }
    }

    public function create(classCuenta $cuenta)
    {
        try {

            //Creamos la query de SQL
            $sql = "INSERT INTO gesbank.cuentas VALUES (
                null,
                :apellidos,
                :nombre,
                :telefono,
                :ciudad,
                :dni,
                :email,
                now(),
                now()
            )";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //Vinculamos los parámetros
            $pdostmt->bindParam(':apellidos', $cuenta->apellidos, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':nombre', $cuenta->nombre, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':telefono', $cuenta->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':ciudad', $cuenta->ciudad, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':dni', $cuenta->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':email', $cuenta->email, PDO::PARAM_STR, 45);

            //Ejecutamos
            $pdostmt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/error.php');
            exit();
        }
    }

    public function read(int $id)
    {
        try {

            //Creamos la query de SQL
            $sql = "SELECT * FROM gesbank.cuentas WHERE id=:id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Creamos un objeto pdostatement
            $pdostmt = $conexion->prepare($sql);

            //Vincular los parámetros con valores
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $e) {
            include('template/partials/errorDB.php');
            exit();
        }
    }

    public function update(int $id, classCuenta $cuenta)
    {
        try {
            // Creamos la consulta a ejecutar
            $sql= "UPDATE gesbank.cuentas SET
            apellidos = :apellidos,
            nombre = :nombre,
            telefono = :telefono,
            ciudad = :ciudad,
            dni = :dni,
            update_at = now()
            WHERE id = :id
            ";

            // Preparamos la consulta
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las parámetros
            $pdostmt->bindParam(':id',$id,PDO::PARAM_INT);
            $pdostmt->bindParam(':apellidos',$cuenta->apellidos,PDO::PARAM_STR,45);
            $pdostmt->bindParam(':nombre',$cuenta->nombre, PDO::PARAM_STR,20);
            $pdostmt->bindParam(':telefono',$cuenta->telefono, PDO::PARAM_STR,9);
            $pdostmt->bindParam(':ciudad',$cuenta->ciudad,PDO::PARAM_STR,20);
            $pdostmt->bindParam(':dni',$cuenta->dni,PDO::PARAM_STR,9);

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
            $sql ="SELECT 
                cuentas.id,
                cuentas.nombre,
                cuentas.apellidos,
                cuentas.email,
                cuentas.telefono,
                cuentas.ciudad,
                cuentas.dni FROM gesbank.cuentas ORDER BY :criterioOrdenacion";

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
            exit();
        }
    }

    public function filter($expresion)
    {
        try {
            $sql ="SELECT 
                cuentas.id,
                cuentas.nombre,
                cuentas.apellidos,
                cuentas.email,
                cuentas.telefono,
                cuentas.ciudad,
                cuentas.dni FROM gesbank.cuentas
                WHERE CONCAT_WS(' ', cuentas.id, cuentas.nombre, cuentas.apellidos,
                                     cuentas.email, cuentas.telefono, cuentas.ciudad, cuentas.dni) 
                LIKE :expresion";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //bindValue para que no se pueda introducir código en expresion
            $expresion = '%'.$expresion.'%';
            $pdostmt -> bindParam(":expresion",$expresion);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
        }
    }

    public function delete(int $id){
        try {
            //Sentencia SQL
            $sql = "DELETE FROM gesbank.cuentas WHERE cuentas.id=:id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //Vinculamos los parámetros
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);

            //Ejecutamos
            $pdostmt->execute();
        } catch (PDOException $e) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }

}
