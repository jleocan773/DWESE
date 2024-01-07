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
            $sql = "SELECT 
            cuentas.id,
            cuentas.num_cuenta,
            clientes.nombre AS nombreCuenta,
            clientes.apellidos AS apellidosCuenta,
            cuentas.fecha_alta,
            cuentas.fecha_ul_mov,
            cuentas.num_movtos,
            cuentas.saldo
            FROM gesbank.cuentas
            INNER JOIN clientes ON cuentas.id_cliente = clientes.id
            ORDER BY cuentas.id";

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
                :num_cuenta,
                :id_cliente,
                :fecha_alta,
                :fecha_ul_mov,
                :num_movtos,
                :saldo,
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
            $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos);
            $pdostmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_STR);

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
            $sql = "UPDATE gesbank.cuentas SET
                num_cuenta = :num_cuenta,
                id_cliente = :id_cliente,
                fecha_alta = :fecha_alta,
                fecha_ul_mov = :fecha_ul_mov,
                num_movtos = :num_movtos,
                saldo = :saldo,        
                update_at = now()   
            WHERE id = :id
            ";

            // Preparamos la consulta   
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($sql);

            // Vinculamos las parámetros
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos);
            $pdostmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_STR);

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
            $sql = "SELECT 
                cuentas.id,
                cuentas.num_cuenta,
                clientes.nombre AS nombreCuenta,
                clientes.apellidos AS apellidosCuenta,
                cuentas.fecha_alta,
                cuentas.fecha_ul_mov,
                cuentas.num_movtos,
                cuentas.saldo
            FROM gesbank.cuentas INNER JOIN clientes ON cuentas.id_cliente = clientes.id
            ORDER BY :criterioORdenacion";

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
            $sql = "SELECT 
            cuentas.id,
            cuentas.num_cuenta,
            clientes.nombre AS nombreCuenta,
            clientes.apellidos AS apellidosCuenta,
            cuentas.fecha_alta,
            cuentas.fecha_ul_mov,
            cuentas.num_movtos,
            cuentas.saldo
            FROM gesbank.cuentas
            INNER JOIN clientes ON cuentas.id_cliente = clientes.id
                WHERE CONCAT_WS(' ', cuentas.id, cuentas.num_cuenta, nombreCuenta, apellidosCuenta,
                                     cuentas.fecha_alta, cuentas.fecha_ul_mov, cuentas.num_movtos, cuentas.saldo) 
                LIKE :expresion";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($sql);

            //bindValue para que no se pueda introducir código en expresion
            $expresion = '%' . $expresion . '%';
            $pdostmt->bindParam(":expresion", $expresion);

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

    public function delete(int $id)
    {
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
