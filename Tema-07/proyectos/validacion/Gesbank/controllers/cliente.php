<?php
class Cliente extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        //Cambio la propiedad title de la vista
        $this->view->title = "Home - Panel Control Clientes";

        //Creamos la variable clientes dentro de la vista
        //Esta variable ejecuta el método get() del modelo clienteModel
        $this->view->clientes = $this->model->get();

        $this->view->render('cliente/main/index');
    }

    function new()
    {

        //Cambio la propiedad title de la vista
        $this->view->title = "Añadir - Gestión Clientes";

        $this->view->render('cliente/new/index');
    }

    function create($param = [])
    {
        //Cargamos los datos del formulario para crear el nuevo cliente
        $cliente = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
        );

        //Validación (no la haremos)

        // Añadimos el registro a la tabla
        $this->model->create($cliente);

        //Redigirimos a "cliente"
        header("Location: " . URL . "cliente");
    }


    function edit($param = [])
    {
        //Obtengo el valor del ID del cliente a editar
        //Por ejemplo cliente/edit/4 - el 4 es el primer parámetro de la función edit
        //Creo una variable $id y la igualo al valor del primer parámetro pasado
        $id = $param[0];

        //Creo una variable id en view y la igualo al valor de la variable creado justo antes
        $this->view->id = $id;

        //Cambio la propiedad title de la vista
        $this->view->title = "Editar - Gestión Cliente";

        //Obtener objeto de la clase cliente
        $this->view->cliente = $this->model->read($id);

        //Cargo la vista
        $this->view->render('cliente/edit/index');
    }

    function update($param = [])
    {
        //Obtengo el valor del ID del cliente a editar
        //Por ejemplo cliente/edit/4 - el 4 es el primer parámetro de la función edit
        //Creo una variable $id y la igualo al valor del primer parámetro pasado
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Cargo detalles del formulario
        $cliente = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
        );

        //Obtener objeto de la clase cliente
        $this->model->update($id, $cliente);

        //Redigirimos a "cliente"
        header("Location: " . URL . "cliente");
    }

    function delete($param = [])
    {
        //Obtengo el valor del ID del cliente a eliminar
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Eliminamos el registro en la base de datos
        $this->model->delete($id);

        //Redigirimos a "cliente"
        header("Location: " . URL . "cliente");
    }

    function show($param = [])
    {
        //Obtengo el valor del ID del cliente a mostrar
        $id = $param[0];

        //Asignamos el id a una variable de la vista
        $this->view->id = $id;

        //Cambio la propiedad title de la vista
        $this->view->title = "Mostrar - Gestión Cliente";

        //Obtener objeto de la clase cliente
        $this->view->cliente = $this->model->read($id);

        //Cargo la vista
        $this->view->render('cliente/show/index');
    }


    function order($param = [])
    {
        //Obtengo el criterio de ordenación
        $criterioOrdenacion = $param[0];

        //Cambio la propiedad title de la vista
        $this->view->title = "Ordenar - Gestión Clientes";

        //Creamos la variable clientes dentro de la vista
        //Esta variable ejecuta el método get() del modelo clienteModel
        $this->view->clientes = $this->model->order($criterioOrdenacion);

        //Cargo la vista index
        $this->view->render('cliente/main/index');
    }
    function filter($param = [])
    {
        //Obtengo la expresión de filtrado
        $expresion = $_GET['expresion'];

        //Cambio la propiedad title de la vista
        $this->view->title = "Buscar - Gestión clientes";

        //Creamos la variable clientes dentro de la vista
        //Esta variable ejecuta el método get() del modelo clienteModel
        $this->view->clientes = $this->model->filter($expresion);

        //Cargo la vista index
        $this->view->render('cliente/main/index');
    }
}
