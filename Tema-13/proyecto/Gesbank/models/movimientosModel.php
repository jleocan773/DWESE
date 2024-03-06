<?php

class movimientosModel extends Model
{

    # Método get
    # consulta SELECT sobre la tabla cuentas y clientes
    public function get()
    {
        try
        {

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
        } catch (PDOException $e)
        {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}