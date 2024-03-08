<?php

class Usuarios extends Controller
{

    # Método render
    # Principal del controlador Usuarios
    # Muestra los detalles de la tabla usuarios
    function render($param = [])
    {

        # Inicio o continúo la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['main']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            # Comprobar si existe el mensaje
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Tabla Usuarios";

            # Creo la propiedad model dentro de la vista para usar el método para pillar el roln
            $this->view->model = $this->model;

            # Creo la propiedad clientes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->usuarios = $this->model->getUsers();
            $this->view->roles = $this->model->getRoles();
            $this->view->render("usuarios/main/index");
        }
    }

    # Método nuevo
    # Muestra un formulario para añadir un nuevo usuario
    function nuevo($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['nuevo']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            # Creamos un objeto vacío
            $this->view->usuario = new classUser();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                //Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                //Autorellenamos el formulario
                $this->view->usuario = unserialize($_SESSION['usuario']);
                $this->view->roles = $this->model->getRoles();

                //Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                //Recuperamos el valor del rol de la sesión y lo pasamos a la vista
                $this->view->rolSeleccionado = isset($_SESSION['roles']) ? $_SESSION['roles'] : null;

                //Una vez usadas las variables de sesión, las liberamos
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['usuario']);
            }

            //Añadimos a la vista la propiedad title
            $this->view->title = "Añadir - Gestión Usuarios";
            //Para generar la lista select dinámica de clientes
            $this->view->roles = $this->model->getRoles();

            //Cargamos la vista del formulario para añadir un nuevo usuario
            $this->view->render("usuarios/nuevo/index");
        }
    }

    # Método create
    # Envía los detalles para crear una nuevo usuario
    function create($param = [])
    {
        //Iniciar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['nuevo']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            //1. Seguridad. Saneamos los datos del formulario

            //Si se introduce un campo vacío, se le otorga "nulo"
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $roles = filter_var($_POST['roles'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $contraseña = filter_var($_POST['contraseña'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmarContraseña = filter_var($_POST['confirmarContraseña'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            //2. Creamos el cliente con los datos saneados
            //Cargamos los datos del formulario
            $usuario = new classUser(
                null,
                $nombre,
                $email,
                $contraseña,
                $confirmarContraseña
            );

            # 3. Validación
            $errores = [];

            //Nombre: Obligatorio
            if (empty($nombre)) {
                $errores['nombre'] = 'El campo nombre es obligatorio';
            }

            //Email: Obligatorio, debe ser un email	, debe ser único	
            if (empty($email)) {
                $errores['email'] = 'El campo email es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'El formato del email no es correcto';
            } else if (!$this->model->isEmailUnique($email)) {
                $errores['email'] = 'El email ya existe';
            }

            //Contraseña: Obligatorio
            if (empty($contraseña)) {
                $errores['contraseña'] = 'El campo contraseña es obligatorio';
            } else if ($contraseña != $confirmarContraseña) {
                $errores['contraseña'] = 'Las contraseñas no coinciden, introduzca ambas de nuevo';
            }

            //confirmarContraseña: Obligatorio, tiene que coincidir con el campo contraseña
            if (empty($confirmarContraseña)) {
                $errores['confirmarContraseña'] = 'El campo de confirmación de contraseña es obligatorio';
            } else if ($contraseña != $confirmarContraseña) {
                $errores['confirmarContraseña'] = 'Las contraseñas no coinciden, introduzca ambas de nuevo';
            }

            //Roles: Obligatorio, tiene que estar entre los permitidos
            if (empty($roles)) {
                $errores['roles'] = 'El campo roles es obligatorio';
            } else if (!in_array($roles, $GLOBALS['usuarios']['roles'])) {
                $errores['roles'] = 'Rol no permitido';
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                //Errores de validación
                $_SESSION['usuario'] = serialize($usuario);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;
                $_SESSION['roles'] = $roles;

                //Redireccionamos de nuevo al formulario
                header('location:' . URL . 'usuarios/nuevo/index');
            } else {
                # Añadimos el registro a la tabla
                $this->model->create($nombre, $email, $contraseña, $roles);

                //Crearemos un mensaje, indicando que se ha realizado dicha acción
                $_SESSION['mensaje'] = "Se ha creado el usuario correctamente.";

                // Redireccionamos a la vista principal de usuarios
                header("Location:" . URL . "usuarios");
            }
        }
    }

    # Método mostrar
    # Muestra los detalles de un usuario en un formulario no editable
    function mostrar($param = [])
    {

        //Iniciar o continuar sesión
        session_start();

        # id del usuario
        $id = $param[0];

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['mostrar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            $this->view->title = "Formulario Mostrar Usuario";
            $this->view->usuario = $this->model->getUserByID($id);
            $this->view->rol = $this->model->getRoleOfUser($id);

            $this->view->render("usuarios/mostrar/index");
        }
    }

    # Método delete
    # Permite eliminar un usuario de la tabla
    function delete($param = [])
    {

        # Inicio o continúo la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            //Obteneemos id del objeto
            $id = $param[0];

            //Eliminamos el objeto
            $this->model->delete($id);

            //Generar mensasje
            $_SESSION['mensaje'] = 'Usuario borrado correctamente';

            header("Location:" . URL . "usuarios");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla usuario a partir de alguna de las columnas de la tabla
    function ordenar($param = [])
    {
        //Inicio o continuo sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['ordenar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {

            $criterio = $param[0];
            $this->view->title = "Tabla Usuarios";
            $this->view->usuarios = $this->model->order($criterio);
            $this->view->model = $this->model;
            $this->view->render("usuarios/main/index");
        }
    }

    # Método buscar
    # Permite realizar una búsqueda en la tabla usuarios a partir de una expresión
    function buscar($param = [])
    {
        //Inicio o continuo sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['buscar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
        } else {


            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Usuarios";
            $this->view->usuarios = $this->model->filter($expresion);
            $this->view->model = $this->model;
            $this->view->render("usuarios/main/index");
        }
    }

    # Método editar
    # Muestra los detalles de un usuario en un formulario de edición
    public function editar($param = [])
    {
        //Iniciar o continuar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['editar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuario');
        } else {

            //Para generar la lista select dinámica de roles
            $this->view->roles = $this->model->getRoles();

            //Obtengo el id del elemento que voy a editar
            $id = $param[0];

            //Aasigno id a una propiedad de la vista
            $this->view->id = $id;

            //Cambiamos el título title
            $this->view->title = "Editar - Gestión Usuario";

            //Creo la propiedad model dentro de la vista para usar el método para pillar el roln
            $this->view->model = $this->model;

            //Obtenemos objeto de la clase 
            $this->view->usuario = $this->model->getUserByID($id);

            //Obtenemos el rol del usuario actual
            $this->view->rol = $this->model->getRoleOfUser($id);

            //Comprobar si el formulario viene de una validación
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];


                # Autorrellenar el formulario con los detalles del usuario
                $this->view->usuario = unserialize($_SESSION['usuario']);

                # Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['usuario']);
            }

            //Se carga la vista
            $this->view->render('usuarios/editar/index');
        }
    }

    # Método update.
    # Actualiza los detalles de un usuario a partir de los datos del formulario de edición
    public function update($param = [])
    {
        // Iniciar sesión
        session_start();

        // Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";
            header("location:" . URL . "login");
            exit(); // Terminar la ejecución del script
        }

        // Verificar permisos de usuario para editar
        if (!in_array($_SESSION['id_rol'], $GLOBALS['usuarios']['editar'])) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'usuarios');
            exit(); // Terminar la ejecución del script
        }

        # 3. Validación

        // Obtener el ID del usuario a editar
        $id = $param[0];

        // Obtener el objeto de usuario original
        $objOriginal = $this->model->getUserByID($id);

        // Obtener los datos del formulario y sanitizarlos
        $name = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'contraseña', FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmPassword = filter_input(INPUT_POST, 'confirmarContraseña', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validar los datos
        $errores = [];

        // Validar nombre
        if (empty($name)) {
            $errores['nombre'] = 'El campo nombre es obligatorio';
        }

        // Validar email
        if (empty($email)) {
            $errores['email'] = 'El campo email es obligatorio';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El formato del email no es correcto';
        } elseif ($email !== $objOriginal->email && !$this->model->isEmailUnique($email)) {
            $errores['email'] = 'El email ya está en uso';
        }

        // Validar contraseña
        if (!empty($password) || !empty($confirmPassword)) {
            if (empty($password)) {
                $errores['contraseña'] = 'El campo contraseña es obligatorio';
            } elseif ($password !== $confirmPassword) {
                $errores['confirmarContraseña'] = 'Las contraseñas no coinciden';
            }
        }

        // Comprobar si hay errores de validación
        if (!empty($errores)) {
            // Errores de validación
            $_SESSION['error'] = 'Formulario no validado';
            $_SESSION['errores'] = $errores;
            header('Location:' . URL . 'usuarios/editar/' . $id);
            exit(); // Terminar la ejecución del script
        }

        // Si la contraseña no está vacía, cifrarla
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        } else {
            // Mantener la contraseña original si no se proporciona una nueva contraseña
            $hashedPassword = $objOriginal->password;
        }

        // Crear un objeto de usuario con los datos actualizados
        $usuario = new classUser(
            $id,
            $name,
            $email,
            $hashedPassword
        );

        // Obtener el ID del rol seleccionado del formulario
        $idRol = filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_NUMBER_INT);

        // Actualizar el usuario en la base de datos
        $this->model->update($usuario, $id, $idRol);


        // Mensaje de éxito
        $_SESSION['mensaje'] = "Usuario editado correctamente";

        // Redirigir al listado de usuarios
        header('location:' . URL . 'usuarios');
    }
}
