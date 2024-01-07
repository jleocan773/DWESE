<?php
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
        //Obtengo el valor del ID del cuenta a editar
        //Por ejemplo cuenta/edit/4 - el 4 es el primer parámetro de la función edit
        //Creo una variable $id y la igualo al valor del primer parámetro pasado
        $id = $param[0];

        //Creo una variable id en view y la igualo al valor de la variable creado justo antes
        $this->view->id = $id;

        //Cambio la propiedad title de la vista
        $this->view->title = "Editar - Gestión Cuenta";

        //Obtener objeto de la clase cuenta
        $this->view->cuenta = $this->model->read($id);

        //Cargo la vista
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
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
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
        //Obtengo el criterio de ordenación
        $criterioOrdenacion = $param[0];

        //Cambio la propiedad title de la vista
        $this->view->title = "Ordenar - Gestión Cuentas";

        //Creamos la variable cuentas dentro de la vista
        //Esta variable ejecuta el método get() del modelo cuentaModel
        $this->view->cuentas = $this->model->order($criterioOrdenacion);

        //Cargo la vista index
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
