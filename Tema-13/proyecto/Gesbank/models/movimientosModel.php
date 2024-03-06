<?php

class movimientosModel extends Model
{

    # Método get
    # consulta SELECT sobre la tabla movimientos
    public function get()
    {
        try {

            $sql = "
                SELECT 
                movimientos.id,
                cuentas.num_cuenta as cuenta,
                movimientos.fecha_hora,
                movimientos.concepto,
                movimientos.tipo,
                movimientos.cantidad,
                movimientos.saldo
                FROM movimientos INNER JOIN cuentas ON movimientos.id_cuenta = cuentas.id ORDER BY movimientos.id
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
    # Ejecuta INSERT sobre la tabla movimientos
    public function create($movimiento)
    {
        try {
            $sql = " 
                    INSERT INTO 
                        movimientos (
                                    id_cuenta,
                                    fecha_hora,
                                    concepto,
                                    tipo,
                                    cantidad,
                                    saldo
                                ) VALUES ( 
                                    :id_cuenta,
                                    :fecha_hora,
                                    :concepto,
                                    :tipo,
                                    :cantidad,
                                    :saldo
                                )";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);

            //Bindeamos parametros
            $pdoSt->bindParam(":id_cuenta", $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdoSt->bindParam(":fecha_hora", $movimiento->fecha_hora);
            $pdoSt->bindParam(":concepto", $movimiento->concepto, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(":tipo", $movimiento->tipo, PDO::PARAM_STR);
            $pdoSt->bindParam(":cantidad", $movimiento->cantidad, PDO::PARAM_STR);
            $pdoSt->bindParam(":saldo", $movimiento->saldo, PDO::PARAM_STR);

            // ejecuto
            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getCuentas()
    {
        try {
            $sql = "SELECT * from cuentas";

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

    public function getSaldoCuentaPorID($id)
    {
        try {
            $sql = "SELECT saldo FROM cuentas WHERE id = :id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetchColumn();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function actualizarSaldoCuenta($id, $nuevoSaldo)
    {
        try {
            $sql = "UPDATE cuentas SET saldo = :nuevoSaldo WHERE id = :id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->bindParam(":nuevoSaldo", $nuevoSaldo, PDO::PARAM_INT);
            $pdoSt->execute();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}
