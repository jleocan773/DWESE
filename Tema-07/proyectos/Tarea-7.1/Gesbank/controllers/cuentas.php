<?php

class Cuentas extends Controller
{

    # Método render
    # Principal del controlador Cuentas
    # Muestra los detalles de la tabla Cuentas
    function render($param = [])
    {
        $this->view->title = "Tabla Cuentas";
        $this->view->cuentas = $this->model->get();
        $this->view->render("cuentas/main/index");
    }

    # Método nuevo
    # Permite mostrar un formulario que permita añadir una nueva cuenta
    function nuevo($param = [])
    { 
        $this->view->title = "Formulario añadir cuenta";

        // Para generar la lista select dinámica de clientes
        $this->view->clientes= $this->model->getClientes();

        $this->view->render("cuentas/nuevo/index");
    }

    # Método create
    # Envía los detalles para crear una nueva cuenta
    function create($param = [])
    {
        $cuenta = new classCuenta(
            null,
            $_POST["num_cuenta"],
            $_POST["id_cliente"],
            $_POST["fecha_alta"],
            date("d-m-Y H:i:s"),
            0,
            $_POST["saldo"],
            null,
            null
        );
        $this->model->create($cuenta);
        header("Location:" . URL . "cuentas");
    }

    # Método delete
    # Permite eliminar una cuenta de la tabla
    function delete($param = [])
    {
        $id=$param[0];
        $this->model->delete($id);
        header("Location:" . URL . "cuentas");
    }

    # Método editar
    # Muestra los detalles de una cuenta en un formulario de edición
    # Sólo se podrá modificar el titular o cliente de la cuenta
    function editar($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;
        $this->view->title = "Formulario editar cuenta";
        $this->view->clientes = $this->model->getClientes();
        $this->view->cuenta = $this->model->getCuenta($id);
        
        // // formateamos la fecha
        // $fechaf=(str_split($this->view->cuenta->fecha_alta));
        // for ($i=0; $i <9 ; $i++) { 
        //     array_pop($fechaf);
        // }
        // $fechafort=implode($fechaf);
        // $this->view->cuenta->fecha_alta=$fechafort;

        $this->view->render("cuentas/editar/index");
    }

    # Método update
    # Envía los detalles modificados de una cuenta para su actualización en la tabla
    function update($param = [])
    {
        $id = $param[0];

        $cuenta = new classCuenta(
            null,
            $_POST["num_cuenta"],
            $_POST["id_cliente"],
            $_POST["fecha_alta"],
            $_POST["fecha_ul_mov"],
            $_POST["num_movtos"],
            $_POST["saldo"],
            null,
            null
        );

        $this->model->update($cuenta, $id);
        header("Location:" . URL . "cuentas");
    }

    
    # Método mostrar
    # Muestra los detalles de una cuenta en un formulario no editable
    function mostrar($param = [])
    {
        # id de la cuenta
        $id = $param[0];

        $this->view->title = "Formulario Cuenta Mostar";
        $this->view->cuenta = $this->model->getCuenta($id);
        $this->view->cliente = $this->model->getCliente($this->view->cuenta->id_cliente);
       
        // // formateamos la fecha
        // $fechaf=(str_split($this->view->cuenta->fecha_alta));
        // for ($i=0; $i <9 ; $i++) { 
        //     array_pop($fechaf);
        // }
        // $fechafort=implode($fechaf);
        // $this->view->cuenta->fecha_alta=$fechafort;

        $this->view->render("cuentas/mostrar/index");
    }

    # Método ordenar
    # Permite ordenar la tabla cuenta a partir de alguna de las columnas de la tabla
    function ordenar($param=[])
    {
        $criterio=$param[0];
        $this->view->title = "Tabla Cuentas";
        $this->view->cuentas=$this->model->order($criterio);
        $this->view->render("cuentas/main/index");

    }

    # Método buscar
    # Permite realizar una búsqueda en la tabla cuentas a partir de una expresión
    function buscar($param=[])
    {
        $expresion=$_GET["expresion"];
        $this->view->title = "Tabla Cuentas";
        $this->view->cuentas= $this->model->filter($expresion);
        $this->view->render("cuentas/main/index");
    }
}
