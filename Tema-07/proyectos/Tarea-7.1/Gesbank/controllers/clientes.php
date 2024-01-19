<?php

class Clientes extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->get();
        $this->view->render("clientes/main/index");
    }

    # Método nuevo. Muestra formulario añadir cliente
    public function nuevo($param = [])
    {
        //Iniciar o continuar sesión
        session_start();

        //Crear un objeto vacío
        $this->view->cliente = new classCliente();

        //Comprobar si vuelvo de un registro no validado
        if (isset($_SESSION['error'])) {

            //Mensaje de error
            $this->view->error = $_SESSION['error'];

            //Autorrellenar el formulario con los detalles del cliente
            $this->view->cliente = unserialize($_SESSION['cliente']);

            //Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['cliente']);
        }

        //Cambiamos etiqueta title de la vista
        $this->view->title = "Añadir - Gestión Clientes";

        //Cargamos la vista con el formulario nuevo cliente
        $this->view->render('clientes/nuevo/index');
    }

    # Método create. 
    # Permite añadir nuevo cliente a partir de los detalles del formuario
    public function create($param = [])
    {

        //Iniciar sesión
        session_start();

        //1. Seguridad. Saneamos los datos del formulario

        //Si se introduce un campo vacío, se le otorga "nulo"
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);


        //2. Creamos el cliente con los datos saneados
        //Cargamos los datos del formulario
        $cliente = new classCliente(
            null,
            $apellidos,
            $nombre,
            $telefono,
            $ciudad,
            $dni,
            $email,
            null,
            null
        );

        //3. Validación
        $errores = [];

        //Apellidos: Obligatorio
        if (empty($apellidos)) {
            $errores['apellidos'] = 'El campo apellidos es obligatorio';
        } elseif (strlen($apellidos) > 45) {
            $errores['apellidos'] = 'El campo apellidos no debe superar los 45 caracteres';
        }

        //Nombre: Obligatorio
        if (empty($nombre)) {
            $errores['nombre'] = 'El campo nombre es obligatorio';
        } elseif (strlen($nombre) > 20) {
            $errores['nombre'] = 'El campo nombre no debe superar los 20 caracteres';
        }

        //Teléfono: Obligatorio
        if (empty($telefono)) {
            $errores['telefono'] = 'El campo telefono es obligatorio';
        } elseif (!is_numeric($telefono) || strlen($telefono) !== 9) {
            $errores['telefono'] = 'El teléfono debe ser numérico y tener 9 dígitos';
        }

        //Ciudad: Obligatorio
        if (empty($ciudad)) {
            $errores['ciudad'] = 'El campo ciudad es obligatorio';
        } elseif (strlen($ciudad) > 20) {
            $errores['ciudad'] = 'El campo ciudad no debe superar los 20 caracteres';
        }

        //DNI: Obligatorio y Válido
        $options = [
            'options' => [
                'regexp' => '/^(\d{8})([A-Z])$/'
            ]
        ];

        if (empty($dni)) {
            $errores['dni'] = 'El campo dni es obligatorio';
        } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
            $errores['dni'] = 'Formato de DNI incorrecto';
        } else if (!$this->model->validateDNI($dni)) {
            $errores['dni'] = 'El dni ya existe';
        }

        //Email: Obligatorio
        if (empty($email)) {
            $errores['email'] = 'El campo email es obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Formato email incorrecto';
        } else if (!$this->model->validateUniqueEmail($email)) {
            $errores['email'] = 'El email ya existe';
        }

        //4. Comprobar validación
        if (!empty($errores)) {
            //Errores de validación
            //Transforma el objeto en un string
            $_SESSION['cliente'] = serialize($cliente);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            //Redireccionamos a new
            header('Location:' . URL . 'clientes/nuevo');
        } else {
            //Añadir registro a la tabla
            $this->model->create($cliente);

            //Mensaje
            $_SESSION['mensaje'] = "Cliente creado correctamente";

            //Redirigimos al main de clientes
            header('location:' . URL . 'clientes');
        }
    }

    # Método delete. 
    # Permite la eliminación de un cliente
    public function delete($param = [])
    {
        $id = $param[0];
        $this->model->delete($id);
        header("Location:" . URL . "clientes");
    }

    # Método editar. 
    # Muestra un formulario que permita editar los detalles de un cliente
    public function editar($param = [])
    {

        //Iniciar o continuar sesión
        session_start();

        //Obtengo el id del elemento que voy a editar
        $id = $param[0];

        //Aasigno id a una propiedad de la vista
        $this->view->id = $id;

        //Cambiamos el título title
        $this->view->title = "Editar - Gestión Clientes";

        //Obtenemos objeto de la clase 
        $this->view->cliente = $this->model->getCliente($id);

        //Comprobar si el formulario viene de una validación
        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];


            # Autorrellenar el formulario con los detalles del cliente
            $this->view->cliente = unserialize($_SESSION['cliente']);

            # Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['cliente']);
        }

        //Se carga la vista
        $this->view->render('clientes/editar/index');
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {

        //Iniciar sesión
        session_start();

        //1. Seguridad. Saneamos los datos del formulario

        //Si se introduce un campo vacío, se le otorga "nulo"
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);


        //2. Creamos el cliente con los datos saneados
        //Cargamos los datos del formulario
        $cliente = new classCliente(
            null,
            $apellidos,
            $nombre,
            $telefono,
            $ciudad,
            $dni,
            $email,
            null,
            null
        );

        //Cargo id del elemento
        $id = $param[0];

        //Obtengo el objeto del elemento original
        $objOriginal = $this->model->getCliente($id);

        //3. Validación
        $errores = [];

        //Como este es el método de edición, hay que comparar el string con strcmp

        //Apellidos: Obligatorio
        if (strcmp($cliente->apellidos, $objOriginal->apellidos) !== 0) {
            if (empty($apellidos)) {
                $errores['apellidos'] = 'El campo apellidos es obligatorio';
            } elseif (strlen($apellidos) > 45) {
                $errores['apellidos'] = 'El campo apellidos no debe superar los 45 caracteres';
            }
        }

        //Nombre: Obligatorio
        if (strcmp($cliente->nombre, $objOriginal->nombre) !== 0) {
            if (empty($nombre)) {
                $errores['nombre'] = 'El campo nombre es obligatorio';
            } elseif (strlen($nombre) > 20) {
                $errores['nombre'] = 'El campo nombre no debe superar los 20 caracteres';
            }
        }

        //Teléfono: Obligatorio
        if (strcmp($cliente->telefono, $objOriginal->telefono) !== 0) {
            if (empty($telefono)) {
                $errores['telefono'] = 'El campo telefono es obligatorio';
            } elseif (!is_numeric($telefono) || strlen($telefono) !== 9) {
                $errores['telefono'] = 'El teléfono debe ser numérico y tener 9 dígitos';
            }
        }
        //Ciudad: Obligatorio
        if (strcmp($cliente->ciudad, $objOriginal->ciudad) !== 0) {
            if (empty($ciudad)) {
                $errores['ciudad'] = 'El campo ciudad es obligatorio';
            } elseif (strlen($ciudad) > 20) {
                $errores['ciudad'] = 'El campo ciudad no debe superar los 20 caracteres';
            }
        }

        //DNI: Obligatorio y Válido
        if (strcmp($cliente->dni, $objOriginal->dni) !== 0) {
            $options = [
                'options' => [
                    'regexp' => '/^(\d{8})([A-Z])$/'
                ]
            ];

            if (empty($dni)) {
                $errores['dni'] = 'El campo dni es obligatorio';
            } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                $errores['dni'] = 'Formato de DNI incorrecto';
            } else if (!$this->model->validateDNI($dni)) {
                $errores['dni'] = 'El dni ya existe';
            }
        }

        //Email: Obligatorio
        if (strcmp($cliente->email, $objOriginal->email) !== 0) {
            if (empty($email)) {
                $errores['email'] = 'El campo email es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'Formato email incorrecto';
            } else if (!$this->model->validateUniqueEmail($email)) {
                $errores['email'] = 'El email ya existe';
            }
        }

        //4. Comprobar validación
        if (!empty($errores)) {
            //Errores de validación
            //Transforma el objeto en un string
            $_SESSION['cliente'] = serialize($cliente);
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;

            //Redireccionamos a edit
            header('Location:' . URL . 'clientes/editar/' . $id);
        } else {
            //Actualizamos el elemento
            $this->model->update($cliente, $id);

            //Mensaje
            $_SESSION['mensaje'] = "Cliente editado correctamente";

            //Redirigimos al main de clientes
            header('location:' . URL . 'clientes');
        }
    }


    # Método mostrar
    # Muestra en un formulario de solo lectura los detalles de un cliente
    public function mostrar($param = [])
    {
        $id = $param[0];
        $this->view->title = "Formulario Cliente Mostar";
        $this->view->cliente = $this->model->getCliente($id);
        $this->view->render("clientes/mostrar/index");
    }

    # Método ordenar
    # Permite ordenar la tabla de clientes por cualquiera de las columnas de la tabla
    public function ordenar($param = [])
    {
        $criterio = $param[0];
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->order($criterio);
        $this->view->render("clientes/main/index");
    }

    # Método buscar
    # Permite buscar los registros de clientes que cumplan con el patrón especificado en la expresión
    # de búsqueda
    public function buscar($param = [])
    {
        $expresion = $_GET["expresion"];
        $this->view->title = "Tabla Clientes";
        $this->view->clientes = $this->model->filter($expresion);
        $this->view->render("clientes/main/index");
    }
}
