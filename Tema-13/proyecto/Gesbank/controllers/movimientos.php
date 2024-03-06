<?php

class Movimientos extends Controller
{
    //Método para generar la vista principal
    public function render($param = [])
    {

        # Inicio o continúo la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['main']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {

            # Comprobar si existe el mensaje
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Tabla Movimientos";

            # Creo la propiedad movimientos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método getMovimientos();
            $this->view->movimientos = $this->model->getMovimientos();
            $this->view->render("movimientos/main/index");
        }
    }

    //Método para generar la vista del formulario para nuevo Movimiento
    function nuevo($param = [])
    {
        # Iniciamos o continuamos la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['nuevo']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {

            # Creamos un objeto vacío
            $this->view->movimiento = new classMovimiento();

            # Comprobamos si existen errores
            if (isset($_SESSION['error'])) {
                //Añadimos a la vista el mensaje de error
                $this->view->error = $_SESSION['error'];

                //Autorellenamos el formulario
                $this->view->movimiento = unserialize($_SESSION['movimiento']);

                // Recuperamos el array con los errores
                $this->view->errores = $_SESSION['errores'];

                //Una vez usadas las variables de sesión, las liberamos
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['movimientos']);
            }

            //Añadimos a la vista la propiedad title
            $this->view->title = "Añadir - Gestión Movimientos";
            //Para generar la lista select dinámica de cuentas
            $this->view->cuentas = $this->model->getCuentas();

            //Cargamos la vista del formulario para añadir una nueva movimientos
            $this->view->render("movimientos/nuevo/index");
        }
    }

    # Método create
    # Envía los detalles para crear una nuevo movimiento
    function create($param = [])
    {
        //Iniciar sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['nuevo']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {

            //1. Seguridad. Saneamos los datos del formulario

            //Si se introduce un campo vacío, se le otorga "nulo"
            $cuenta = filter_var($_POST['cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_hora = filter_var($_POST['fecha_hora'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $concepto = filter_var($_POST['concepto'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_var($_POST['tipo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $cantidad = filter_var($_POST['cantidad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = $this->model->getSaldoCuentaPorID($cuenta);

            //2. Creamos el cliente con los datos saneados
            //Cargamos los datos del formulario
            $movimiento = new classMovimiento(
                null,
                $cuenta,
                $fecha_hora,
                $concepto,
                $tipo,
                $cantidad,
                $saldo
            );

            # 3. Validación
            $errores = [];


            //Fecha_hora - No obligatorio. fecha hora actual en caso de null
            if (!isset($fecha_hora) || $fecha_hora == '0000-00-00 00:00') {
                $fecha_hora = date('Y-m-d\TH:i');
            }

            //Concepto - Valor obligatorio máximo 50 caracteres
            if (empty($concepto)) {
                $errores['concepto'] = 'El campo concepto es obligatorio';
            } else if (strlen($concepto) > 50) {
                $errores['concepto'] = 'El campo concepto debe ser inferior a 50 caracteres';
            }

            //Tipo - I o R - valor obligatorio. ha de tomar uno de estos valores ingreso o reintegro
            if (empty($tipo)) {
                $errores['tipo'] = 'El campo tipo es obligatorio';
            } else if (!in_array($tipo, ['I', 'R'])) {
                $errores['tipo'] = 'El campo tipo debe ser I o R';
            }

            //Cantidad - Ha de ser un valor tipo float. En caso de un reintegro la cantidad no podrá superar el saldo de la cuenta, en caso contrario, mostrará mensaje cantidad no disponible. 
            //Por otro lado la cantidad en caso de ser un reintegro se almacenará con un número negativo, de esta forma sumando todas las cantidades de los movimientos de una misma cuenta podré 
            //obtener el saldo.
            if (empty($cantidad)) {
                $errores['cantidad'] = 'El campo cantidad es obligatorio';
            } else if (!is_numeric($cantidad)) {
                $errores['cantidad'] = 'El campo cantidad debe ser un valor numérico';
            } else if ($tipo == 'R' && $cantidad > $saldo) {
                $errores['cantidad'] = 'Cantidad no disponible, es superior al saldo de la cuenta';
            }

            # 4. Comprobar validación
            if (!empty($errores)) {
                //Errores de validación
                $_SESSION['movimiento'] = serialize($movimiento);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                //Redireccionamos de nuevo al formulario
                header('location:' . URL . 'movimientos/nuevo/index');
            } else {

                //Actualizamos el saldo
                //Si el tipo fue ingreso, le sumamos la cantidad
                if ($tipo == 'I') {
                    $nuevoSaldo = $saldo + $cantidad;
                }
                //De lo contrario, se lo restamos
                else {
                    $nuevoSaldo = $saldo - $cantidad;
                }

                //Actualizamos el saldo en el objeto movimiento
                $movimiento->saldo = $nuevoSaldo;

                # Añadimos el registro a la tabla
                $this->model->create($movimiento);

                //Actualizamos el saldo de la cuenta
                $this->model->actualizarSaldoCuenta($cuenta, $nuevoSaldo);

                //Crearemos un mensaje, indicando que se ha realizado dicha acción
                $_SESSION['mensaje'] = "Se ha creado el movimiento bancaria correctamente.";

                // Redireccionamos a la vista principal de movimientos
                header("Location:" . URL . "movimientos");
            }
        }
    }

    # Método mostrar
    # Muestra los detalles de un movimiento en un formulario no editable
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['mostrar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {

            $this->view->title = "Formulario Mostrar Movimiento";
            $this->view->movimiento = $this->model->getMovimiento($id);
            $this->view->cuenta = $this->model->getCuenta($this->view->movimiento->cuenta);

            $this->view->render("movimientos/mostrar/index");
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['ordenar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {

            $criterio = $param[0];
            $this->view->title = "Tabla Movimientos";
            $this->view->movimientos = $this->model->order($criterio);
            $this->view->render("movimientos/main/index");
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['buscar']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else {


            $expresion = $_GET["expresion"];
            $this->view->title = "Tabla Movimientos";
            $this->view->movimientos = $this->model->filter($expresion);
            $this->view->render("movimientos/main/index");
        }
    }
}
