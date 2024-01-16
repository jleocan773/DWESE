
<?php
require_once("models/clienteModel.php");

class Cuenta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        //Cambio la propiedad title de la vista
        $this->view->title = "Home - Panel Control Cuentas";

        //Creamos la variable cuentas dentro de la vista
        //Esta variable ejecuta el método get() del modelo cuentaModel
        $this->view->cuentas = $this->model->get();

        $this->view->render('cuenta/main/index');
    }

    function new()
    {
        //Cambio la propiedad title de la vista
        $this->view->title = "Añadir - Gestión Cuentas";

        //Obtenemos los datos de los clientes disponibles desde el modelo de clientes
        $clienteModel = new clienteModel();
        $clientesDisponibles = $clienteModel->get();

        //Para pillar el nombre completo de los clientes creamos un array y asoaciamos el id del cliente a una concatenación
        $clientesConcatenados = [];
        foreach ($clientesDisponibles as $cliente) {
            $nombreCompleto = $cliente->cliente;
            $clientesConcatenados[$cliente->id] = $nombreCompleto;
        }

        //Ordenar alfabéticamente el array por los valores (nombres completos)
        asort($clientesConcatenados);

        //Pasar los datos de clientes concatenados a la vista del formulario de creación de cuentas
        $this->view->clientes = $clientesConcatenados;


        //Renderizar la vista del formulario de creación de cuentas
        $this->view->render('cuenta/new/index');
    }


    function create($param = [])
    {
        //Cargamos los datos del formulario para crear la nuevo cuenta
        $cuenta = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']
        );

        //Validación (no la haremos)

        // Añadimos el registro a la tabla
        $this->model->create($cuenta);

        //Redigirimos a "cuenta"
        header("Location: " . URL . "cuenta");
    }


    function edit($param = [])
    {
        // Obtengo el valor del ID de la cuenta a editar
        $id = $param[0];

        // Creo una variable id en view y la igualo al valor del primer parámetro pasado
        $this->view->id = $id;

        // Cambio la propiedad title de la vista
        $this->view->title = "Editar - Gestión Cuenta";

        // Obtener objeto de la clase cuenta
        $this->view->cuenta = $this->model->read($id);

        // Obtener datos de los clientes disponibles desde el modelo de clientes
        $clienteModel = new clienteModel();
        $clientesDisponibles = $clienteModel->get();

        // Para obtener el nombre completo de los clientes, creamos un array y asociamos el ID del cliente a una concatenación
        $clientesConcatenados = [];
        foreach ($clientesDisponibles as $cliente) {
            $nombreCompleto = $cliente->cliente;
            $clientesConcatenados[$cliente->id] = $nombreCompleto;
        }

        // Ordenar alfabéticamente el array por los valores (nombres completos)
        asort($clientesConcatenados);

        // Pasar los datos de clientes concatenados a la vista del formulario de edición de cuentas
        $this->view->clientes = $clientesConcatenados;

        // Renderizar la vista del formulario de edición de cuentas
        $this->view->render('cuenta/edit/index');
    }


    function update($param = [])
    {
        //Obtengo el valor del ID del cuenta a editar
        //Por ejemplo cuenta/edit/4 - el 4 es el primer parámetro de la función edit
        //Creo una variable $id y la igualo al valor del primer parámetro pasado
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Cargo detalles del formulario
        $cuenta = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']
        );

        //Obtener objeto de la clase cuenta
        $this->model->update($id, $cuenta);

        //Redigirimos a "cuenta"
        header("Location: " . URL . "cuenta");
    }

    function delete($param = [])
    {
        //Obtengo el valor del ID del cuenta a eliminar
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Eliminamos el registro en la base de datos
        $this->model->delete($id);

        //Redigirimos a "cuenta"
        header("Location: " . URL . "cuenta");
    }

    function show($param = [])
    {
        //Obtengo el valor del ID del cuenta a mostrar
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Cambio la propiedad title de la vista
        $this->view->title = "Mostrar - Gestión Cuenta";

        //Obtener objeto de la clase cuenta
        $this->view->cuenta = $this->model->read($id);

        //Cargo la vista
        $this->view->render('cuenta/show/index');
    }


    function order($param = [])
    {

        # Obtengo el criterio de ordenación
        $criterio = $param[0];

        # Creo la propiedad "title" de la vista
        $this->view->title = "Ordenar - Panel de Control cuentas";

        # Creo la propiedad cuentas dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get()
        $this->view->cuentas = $this->model->order($criterio);

        # Cargo la vista principal de cuentas
        $this->view->render('cuenta/main/index');
    }

    function filter($param = [])
    {
        //Obtengo la expresión de filtrado
        $expresion = $_GET['expresion'];

        //Cambio la propiedad title de la vista
        $this->view->title = "Buscar - Gestión Cuentas";

        //Creamos la variable cuentas dentro de la vista
        //Esta variable ejecuta el método get() del modelo cuentaModel
        $this->view->cuentas = $this->model->filter($expresion);

        //Cargo la vista index
        $this->view->render('cuenta/main/index');
    }
}