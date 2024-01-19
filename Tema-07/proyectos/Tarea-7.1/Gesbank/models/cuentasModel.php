<?php

/*
    Modelo cuentasModel
*/


class cuentasModel extends Model
{

    # Método get
    # consulta SELECT sobre la tabla cuentas y clientes
    public function get()
    {
        try {

            $sql = " 
            SELECT 
                c.id,
                c.num_cuenta,
                c.id_cliente,
                c.fecha_alta,
                c.fecha_ul_mov,
                c.num_movtos,
                c.saldo,
                concat_ws(', ', cl.apellidos, cl.nombre) as cliente
            FROM 
                cuentas as c INNER JOIN clientes as cl 
                ON c.id_cliente = cl.id 
            ORDER BY c.id;
            
            ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método create
    # Ejecuta INSERT sobre la tabla cuentas
    public function create($cuenta)
    {
        try {
            $sql = " 
                    INSERT INTO 
                        cuentas (
                                    num_cuenta,
                                    id_cliente,
                                    fecha_alta,
                                    fecha_ul_mov,
                                    num_movtos,
                                    saldo
                                ) VALUES ( 
                                    :num_cuenta,
                                    :id_cliente,
                                    :fecha_alta,
                                    :fecha_ul_mov,
                                    :num_movtos,
                                    :saldo
                                )";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            //Bindeamos parametros
            $pdoSt->bindParam(":num_cuenta", $cuenta->num_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(":id_cliente", $cuenta->id_cliente, PDO::PARAM_INT);
            $pdoSt->bindParam(":fecha_alta", $cuenta->fecha_alta);
            $pdoSt->bindParam(":fecha_ul_mov", $cuenta->fecha_ul_mov);
            $pdoSt->bindParam(":num_movtos", $cuenta->num_movtos, PDO::PARAM_INT);
            $pdoSt->bindParam(":saldo", $cuenta->saldo, PDO::PARAM_INT);

            // ejecuto
            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getClientes
    # Realiza un SELECT sobre la tabla clientes para generar la lista select dinámica de clientes
    public function getClientes()
    {
        try {

            $sql = " 
                SELECT 
                    id,
                    concat_ws(', ', apellidos, nombre) cliente
                FROM 
                    clientes
                ORDER BY apellidos, nombre;
                ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método delete
    # Permite eliminar una cuenta, ejecuta DELETE 
    public function delete($id)
    {
        try {
            $sql = " 
                   DELETE FROM cuentas WHERE id=:id;
                   ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getCuenta
    # Permite obtener los detalles de una cuenta a partir del id
    public function getCuenta($id)
    {
        try {

            $sql = " 
                    SELECT 
                        c.id,
                        c.num_cuenta,
                        c.id_cliente,
                        c.fecha_alta,
                        c.fecha_ul_mov,
                        c.num_movtos,
                        c.saldo
                    FROM 
                        cuentas as c 
                    WHERE
                        id=:id;";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método update
    # Actualiza los detalles de una cuenta, sólo permite modificar el cliente o titular
    public function update(classCuenta $cuenta, $id)
    {
        try {

            $sql = " 
                    UPDATE cuentas SET
                        num_cuenta = :num_cuenta,
                        id_cliente = :id_cliente,
                        fecha_alta = :fecha_alta,
                        fecha_ul_mov = :fecha_ul_mov,
                        num_movtos = :num_movtos,
                        saldo=:saldo,
                        update_at = now()
                    WHERE
                        id=:id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            //Vinculamos los parámetros
            $pdoSt->bindParam(":num_cuenta", $cuenta->num_cuenta, PDO::PARAM_STR, 20);
            $pdoSt->bindParam(":id_cliente", $cuenta->id_cliente, PDO::PARAM_INT);
            $pdoSt->bindParam(":fecha_alta", $cuenta->fecha_alta, PDO::PARAM_STR);
            $pdoSt->bindParam(":fecha_ul_mov", $cuenta->fecha_ul_mov, PDO::PARAM_STR);
            $pdoSt->bindParam(":num_movtos", $cuenta->num_movtos, PDO::PARAM_INT);
            $pdoSt->bindParam(":saldo", $cuenta->saldo, PDO::PARAM_INT);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);

            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }



    # Método order
    # Permite ordenar la tabla por cualquiera de las columnas de la tabla
    public function order(int $criterio)
    {
        try {

            $sql = " 
                SELECT 
                    c.id,
                    c.num_cuenta,
                    c.id_cliente,
                    c.fecha_alta,
                    c.fecha_ul_mov,
                    c.num_movtos,
                    c.saldo,
                    concat_ws(', ', cl.apellidos, cl.nombre) as cliente
                FROM 
                    cuentas AS c INNER JOIN clientes as cl 
                    ON c.id_cliente=cl.id 
                ORDER BY
                    :criterio ";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }


    # Método filter
    # Permite filtrar la tabla cuentas a partir de una expresión de búsqueda o filtrado
    public function filter($expresion)
    {
        try {

            $sql = "
                    SELECT 
                        c.id,
                        c.num_cuenta,
                        c.id_cliente,
                        c.fecha_alta,
                        c.fecha_ul_mov,
                        c.num_movtos,
                        c.saldo,
                        concat_ws(', ', cl.apellidos, cl.nombre) as cliente
                    FROM 
                        cuentas as c INNER JOIN clientes as cl 
                        ON c.id_cliente=cl.id
                    WHERE 
                        concat_ws(  ' ',
                                    c.num_cuenta,
                                    c.id_cliente,
                                    c.fecha_alta,
                                    c.fecha_ul_mov,
                                    c.num_movtos,
                                    c.saldo,
                                    cl.nombre,
                                    cl.apellidos
                                )
                    LIKE
                        :expresion ";


            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt;
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getCliente
    # Obtiene los detalles de un cliente a partir del id
    public function getCliente($id)
    {
        try {
            $sql = " 
                    SELECT     
                        id,
                        apellidos,
                        nombre,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM  
                        clientes  
                    WHERE
                        id = :id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}
