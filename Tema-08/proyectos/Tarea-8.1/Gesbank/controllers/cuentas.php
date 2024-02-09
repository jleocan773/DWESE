<?php

class Cuentas extends Controller
{

    # Método render
    # Principal del controlador Cuentas
    # Muestra los detalles de la tabla Cuentas
    function render($param = [])
    {

        # Inicio o continúo la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['main']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            # Comprobar si existe el mensaje
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Tabla Cuentas";

            # Creo la propiedad clientes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->cuentas = $this->model->get();
            $this->view->render("cuentas/main/index");
        }
    }

    function nuevo($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['nuevo']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            # Creamos un objeto vacío
            $this->view->cuenta = new classCuenta();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                //Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                //Autorellenamos el formulario
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                //Una vez usadas las variables de sesión, las liberamos
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);
            }

            //Añadimos a la vista la propiedad title
            $this->view->title = "Añadir - Gestión Cuentas";
            //Para generar la lista select dinámica de clientes
            $this->view->clientes = $this->model->getClientes();

            //Cargamos la vista del formulario para añadir una nueva cuenta
            $this->view->render("cuentas/nuevo/index");
        }
    }

    # Método create
    # Envía los detalles para crear una nueva cuenta
    function create($param = [])
    {
        //Iniciar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['nuevo']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            //1. Seguridad. Saneamos los datos del formulario

            //Si se introduce un campo vacío, se le otorga "nulo"
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            //2. Creamos el cliente con los datos saneados
            //Cargamos los datos del formulario
            $cuenta = new classCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                date("d-m-Y H:i:s"),
                0,
                $saldo,
                null,
                null
            );

            # 3. Validación
            $errores = [];

            //Número de la cuenta. Campo obligatorio, tamaño de 20 dígitos númericos, valor único (clave segundaria)
            //Expresión regular (REGEXP)
            $cuenta_regexp = [
                'options' => [
                    'regexp' => '/^[0-9]{20}$/'
                ]
            ];
            if (empty($num_cuenta)) {
                $errores['num_cuenta'] = 'El campo número de cuenta es obligatorio';
            } else if (!filter_var($num_cuenta, FILTER_VALIDATE_REGEXP, $cuenta_regexp)) {
                $errores['num_cuenta'] = 'El número de cuenta debe ser 20 números';
            } else if (!$this->model->validateUniqueNumCuenta($num_cuenta)) {
                $errores['num_cuenta'] = "Este número de cuenta ya existe";
            }

            //Cliente. Campo obligatorio, valor numérico, debe existir en la tabla de clientes
            if (empty($id_cliente)) {
                $errores['id_cliente'] = 'El campo cliente es obligatorio';
            } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                $errores['id_cliente'] = 'Deberá introducir un valor númerico en este campo';
            } else if (!$this->model->validateCliente($id_cliente)) {
                $errores['id_cliente'] = 'El cliente seleccionado no existe';
            }

            //Fecha alta. Campo obligatorio, con formato valido
            if (empty($fecha_alta)) {
                $errores['fecha_alta'] = 'El campo fecha alta es obligatorio';
            } else if (!$this->model->validateFechaAlta($fecha_alta)) {
                $errores['fecha_alta'] = 'La fecha no tiene un formato correcto';
            }

            //Saldo: Obligatorio, valor numérico
            if (empty($saldo)) {
                $errores['saldo'] = 'El campo saldo es obligatorio';
            } else if (!is_numeric($saldo)) {
                $errores['saldo'] = 'El campo saldo debe ser numérico';
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                //Errores de validación
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                //Redireccionamos de nuevo al formulario
                header('location:' . URL . 'cuentas/nuevo/index');
            } else {
                # Añadimos el registro a la tabla
                $this->model->create($cuenta);

                //Crearemos un mensaje, indicando que se ha realizado dicha acción
                $_SESSION['mensaje'] = "Se ha creado la cuenta bancaria correctamente.";

                // Redireccionamos a la vista principal de cuentas
                header("Location:" . URL . "cuentas");
            }
        }
    }

    # Método delete
    # Permite eliminar una cuenta de la tabla
    function delete($param = [])
    {

        # Inicio o continúo la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            //Obteneemos id del objeto
            $id = $param[0];

            //Eliminamos el objeto
            $this->model->delete($id);

            //Generar mensasje
            $_SESSION['notify'] = 'Cuenta borrada correctamente';

            header("Location:" . URL . "cuentas");
        }
    }

    # Método editar
    # Muestra los detalles de una cuenta en un formulario de edición
    # Sólo se podrá modificar el titular o cliente de la cuenta
    public function editar($param = [])
    {

        //Iniciar o continuar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['editar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            //Para generar la lista select dinámica de clientes
            $this->view->clientes = $this->model->getClientes();

            //Obtengo el id del elemento que voy a editar
            $id = $param[0];

            //Aasigno id a una propiedad de la vista
            $this->view->id = $id;

            //Cambiamos el título title
            $this->view->title = "Editar - Gestión Cuentas";

            //Obtenemos objeto de la clase 
            $this->view->cuenta = $this->model->getCuenta($id);

            //Comprobar si el formulario viene de una validación
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];


                # Autorrellenar el formulario con los detalles de la cuenta
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                # Recupero array de errores específicos
                $this->view->errores = $_SESSION['errores'];

                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);
            }

            //Se carga la vista
            $this->view->render('cuentas/editar/index');
        }
    }

    # Método update.
    # Actualiza los detalles de un cliente a partir de los datos del formulario de edición
    public function update($param = [])
    {

        //Iniciar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['editar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            //1. Seguridad. Saneamos los datos del formulario

            //Si se introduce un campo vacío, se le otorga "nulo"
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            //2. Creamos el cliente con los datos saneados
            //Cargamos los datos del formulario
            $cuenta = new classCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                date("d-m-Y H:i:s"),
                0,
                $saldo,
                null,
                null
            );

            //Cargo id del elemento
            $id = $param[0];

            //Obtengo el objeto del elemento original
            $objOriginal = $this->model->getCuenta($id);

            # 3. Validación
            $errores = [];

            //Número de la cuenta. Campo obligatorio, tamaño de 20 dígitos númericos, valor único (clave segundaria)
            //Expresión regular (REGEXP)
            $cuenta_regexp = [
                'options' => [
                    'regexp' => '/^[0-9]{20}$/'
                ]
            ];
            if (strcmp($cuenta->num_cuenta, $objOriginal->num_cuenta) !== 0) {
                if (empty($num_cuenta)) {
                    $errores['num_cuenta'] = 'El campo número de cuenta es obligatorio';
                } else if (!filter_var($num_cuenta, FILTER_VALIDATE_REGEXP, $cuenta_regexp)) {
                    $errores['num_cuenta'] = 'El número de cuenta debe ser 20 números';
                } else if (!$this->model->validateUniqueNumCuenta($num_cuenta)) {
                    $errores['num_cuenta'] = 'El número de cuenta ya existe';
                }
            }

            //Cliente. Campo obligatorio, valor numérico, debe existir en la tabla de clientes
            if (strcmp($cuenta->id_cliente, $objOriginal->id_cliente) !== 0) {
                if (empty($id_cliente)) {
                    $errores['id_cliente'] = 'El campo cliente es obligatorio';
                } else if (!filter_var($id_cliente, FILTER_VALIDATE_INT)) {
                    $errores['id_cliente'] = 'Deberá introducir un valor númerico en este campo';
                } else if (!$this->model->validateCliente($id_cliente)) {
                    $errores['id_cliente'] = 'El cliente seleccionado no existe';
                }
            }

            //Fecha alta. Campo obligatorio, con formato valido
            if (strcmp($cuenta->id_cliente, $objOriginal->id_cliente) !== 0) {
                if (empty($fecha_alta)) {
                    $errores['fecha_alta'] = 'El campo fecha alta es obligatorio';
                } else if (!$this->model->validateFechaAlta($fecha_alta)) {
                    $errores['fecha_alta'] = 'La fecha no tiene un formato correcto';
                }
            }

            //Saldo: Obligatorio, valor numérico
            if (empty($saldo)) {
                $errores['saldo'] = 'El campo saldo es obligatorio';
            } else if (!is_numeric($saldo)) {
                $errores['saldo'] = 'El campo saldo debe ser numérico';
            }

            //4. Comprobar validación
            if (!empty($errores)) {
                //Errores de validación
                //Transforma el objeto en un string
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                //Redireccionamos a edit
                header('Location:' . URL . 'cuentas/editar/' . $id);
            } else {
                //Actualizamos el elemento
                $this->model->update($cuenta, $id);

                //Mensaje
                $_SESSION['mensaje'] = "Cuenta editada correctamente";

                //Redirigimos al main de cuentas
                header('location:' . URL . 'cuentas');
            }
        }
    }

    # Método mostrar
    # Muestra los detalles de una cuenta en un formulario no editable
    function mostrar($param = [])
    {

        //Iniciar o continuar sesión
        session_start();

        # id de la cuenta
        $id = $param[0];

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['mostrar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            $this->view->title = "Formulario Cuenta Mostar";
            $this->view->cuenta = $this->model->getCuenta($id);
            $this->view->cliente = $this->model->getCliente($this->view->cuenta->id_cliente);

            $this->view->render("cuentas/mostrar/index");
        }
    }

    # Método ordenar
    # Permite ordenar la tabla cuenta a partir de alguna de las columnas de la tabla
    function ordenar($param = [])
    {
        //Inicio o continuo sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['ordenar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {

            $criterio = $param[0];
            $this->view->title = "Tabla Cuentas";
            $this->view->cuentas = $this->model->order($criterio);
            $this->view->render("cuentas/main/index");
        }
    }

    # Método buscar
    # Permite realizar una búsqueda en la tabla cuentas a partir de una expresión
    function buscar($param = [])
    {
        //Inicio o continuo sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuentas']['buscar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'cuentas');
        } else {


            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Cuentas";
            $this->view->cuentas = $this->model->filter($expresion);
            $this->view->render("cuentas/main/index");
        }
    }

    // Método de Exportación
    public function exportarCSV($param = [])
    {
        //Obtenemos datos de cuentas
        $cuentas = $this->model->get()->fetchAll(PDO::FETCH_ASSOC);

        //Ponemos el nombre del archivo
        $csvExportado = 'cuentas.csv';

        //Cabecera HTTP para indicar que se enviará un archivo CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $csvExportado . '"');

        //Abrimos el archivo CSV
        $archivo = fopen('php://output', 'w');

        //Escribimos la cabecera del CSV
        fputcsv($archivo, array('id', 'num_cuenta', 'id_cliente', 'fecha_alta', 'fecha_ul_mov', 'num_movtos', 'saldo', 'create_at', 'update_at'), ';');

        //Obtenemos la fecha y hora actual
        $fechaHoraActual = date('Y-m-d H:i:s');

        //Escribimos los datos al archivo CSV
        foreach ($cuentas as $cuenta) {
            //Reordenar los campos de la cuenta
            $cuenta = array(
                'id' => $cuenta['id'],
                'num_cuenta' => $cuenta['num_cuenta'],
                'id_cliente' => $cuenta['id_cliente'],
                'fecha_alta' => $cuenta['fecha_alta'],
                'fecha_ul_mov' => $cuenta['fecha_ul_mov'],
                'num_movtos' => $cuenta['num_movtos'],
                'saldo' => $cuenta['saldo'],
                'create_at' => $fechaHoraActual,
                'update_at' => $fechaHoraActual
            );

            //Escribimos la información de la cuenta al archivo CSV
            fputcsv($archivo, $cuenta, ';');
        }

        //Cerramos el archivo
        fclose($archivo);
    }
}
