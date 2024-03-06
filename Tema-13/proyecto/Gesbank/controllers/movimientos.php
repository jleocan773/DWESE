<?php

class Movimientos extends Controller
{
    public function render($param = [])
    {

        # Inicio o continúo la sesión
        session_start();

        //Comprobar si el usuario está identificado
        if (!isset($_SESSION['id']))
        {
            $_SESSION['mensaje'] = "Usuario No Autentificado";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimientos']['main'])))
        {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'movimientos');
        } else
        {

            # Comprobar si existe el mensaje
            if (isset($_SESSION['mensaje']))
            {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            # Creo la propiedad title de la vista
            $this->view->title = "Tabla Movimiento";

            # Creo la propiedad movimientos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->movimientos = $this->model->get();
            $this->view->render("movimientos/main/index");
        }
    }
}