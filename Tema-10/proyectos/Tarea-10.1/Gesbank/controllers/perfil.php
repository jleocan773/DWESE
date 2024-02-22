<?php

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/auth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Perfil extends Controller
{

    # Muestra los detalles del perfil antes de eliminar
    public function render()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {
            header("location:" . URL . "login");
        }

        //Capa mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        # Obtenemos objeto con los detalles del usuario
        $this->view->user = $this->model->getUserId($_SESSION['id']);
        $this->view->title = 'Perfil de Usuario - Gestión Gesbank - MVC';

        $this->view->render('perfil/main/index');
    }

    # Editar los detalles name y email de usuario
    public function edit()
    {

        # Iniciamos o continuamos sesión
        session_start();

        # Capa de autentificación
        if (!isset($_SESSION['id'])) {

            header('location:' . URL . 'login');
        }

        # Comprobamos si existe mensaje
        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        # Obtenemos objeto User con los detalles del usuario
        $this->view->user = $this->model->getUserId($_SESSION['id']);

        # Capa no validación formulario
        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            # Variables de autorrelleno
            $this->view->user = unserialize($_SESSION['user']);
            unset($_SESSION['user']);

            # Tipo de error
            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);
        }

        $this->view->title = 'Modificar Perfil Usuario - Gestión Gesbank';
        $this->view->render('perfil/edit/index');
    }

    # Valida el formulario de modificación de perfil
    public function valperfil()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");
        }

        # Saneamos el formulario
        $name = filter_var($_POST['name'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= null, FILTER_SANITIZE_EMAIL);

        # Obtenemos objeto con los detalles del usuario
        $user = $this->model->getUserId($_SESSION['id']);

        # Validaciones
        $errores = [];

        //Hacemos comparación del name del usuario que acabamos de recibir con el name del formulario
        if (strcmp($user->name, $name) !== 0) {
            if (empty($name)) {
                $errores['name'] = "Nombre de usuario es obligatorio";
            } else if ((strlen($name) < 5) || (strlen($name) > 50)) {
                $errores['name'] = "Nombre de usuario ha de tener entre 5 y 50 caracteres";
            } else if (!$this->model->validateName($name)) {
                $errores['name'] = "Nombre de usuario ya ha sido registrado";
            }
        }

        // email
        if (strcmp($user->email, $email) !== 0) {
            if (empty($email)) {
                $errores['email'] = "Email es un campo obligatorio";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Email no válido";
            } elseif (!$this->model->validateEmail($email)) {
                $errores['email'] = "Email ya ha sido registrado";
            }
        }

        # Crear objeto user
        $user = new classUser(
            $user->id,
            $name,
            $email,
            null
        );


        # Comprobamos si hay errores
        if (!empty($errores)) {
            $_SESSION['errores'] = $errores;
            $_SESSION['user'] = serialize($user);
            $_SESSION['error'] = "Formulario con errores de validación";

            header('location:' . URL . 'perfil/edit');
        } else {

            # Actualizamos perfil
            $this->model->update($user);

            try {
                // Configurar PHPMailer
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;

                $mail->Username = USUARIO;                                      // Cambiar por tu dirección de correo
                $mail->Password = PASS;                                         // Cambiar por tu contraseña

                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configurar destinatario, remitente, asunto y mensaje
                $destinatario = $email;
                $remitente = USUARIO;
                $asuntoMail = "Cambio de información de tu Perfil";
                $mensajeMail =
                    "Has cambiado la información de tu perfil recientemente: <br><br>"
                    . "Nuevo Nombre: " . $name . "<br>"
                    . "Nuevo Email: " . $email . "<br>";

                $mail->setFrom($remitente, $name);
                $mail->addAddress($destinatario);
                $mail->addReplyTo($remitente, $name);

                $mail->isHTML(true);
                $mail->Subject = $asuntoMail;
                $mail->Body = $mensajeMail;

                // Enviar correo electrónico
                $mail->send();
            } catch (Exception $e) {
                // Manejar excepciones
                $_SESSION['error'] = 'Error al enviar el mensaje: ' . $e->getMessage();
            }

            $_SESSION['name_user'] = $name;
            $_SESSION['mensaje'] = 'Usuario modificado correctamente';

            header('location:' . URL . 'perfil');
        }
    }


    # Modificación del password
    public function pass()
    {

        # Iniciamos o continuamos sesión
        session_start();

        # Capa de autentificación
        if (!isset($_SESSION['id'])) {

            header('location:' . URL . 'login');
        }

        # Comprobamos si existe mensaje
        if (isset($_SESSION['mensaje'])) {

            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        # Capa no validación formulario
        if (isset($_SESSION['error'])) {

            # Mensaje de error
            $this->view->error = $_SESSION['error'];
            unset($_SESSION['error']);

            # Tipo de error
            $this->view->errores = $_SESSION['errores'];
            unset($_SESSION['errores']);
        }

        # título página
        $this->view->title = "Modificar password";
        $this->view->render('perfil/pass/index');
    }

    # Validación cambio password
    public function valpass()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");
        }

        # Saneamos el formulario
        $password_form = filter_var($_POST['password_form'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var($_POST['password'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $password_confirm = filter_var($_POST['password_confirm'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);

        # Obtenemos objeto con los detalles del usuario
        $user = $this->model->getUserId($_SESSION['id']);
        $infoUsuario = $this->model->getUserId($_SESSION['id']);

        # Validaciones
        $errores = array();

        # Validar password actual
        if (!password_verify($password_form, $user->password)) {
            $errores['password_form'] = "Password actual no es correcto";
        }

        # Validar nuevo password
        if (empty($password)) {
            $errores['password'] = "Password no introducido";
        } else if (strcmp($password, $password_confirm) !== 0) {
            $errores['password'] = "Password no coincidentes";
        } else if ((strlen($password) < 5) || (strlen($password) > 60)) {
            $errores['password'] = "Password ha de tener entre 5 y 60 caracteres";
        }


        if (!empty($errores)) {

            $_SESSION['errores'] = $errores;
            $_SESSION['error'] = "Formulario con errores de validación";

            header("location:" . URL . "perfil/pass");
        } else {

            # Crear objeto user
            $user = new classUser(
                $user->id,
                null,
                null,
                $password
            );

            # Actualiza password
            $this->model->updatePass($user);

            try {
                // Configurar PHPMailer
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;

                $mail->Username = USUARIO;                                      // Cambiar por tu dirección de correo
                $mail->Password = PASS;                                         // Cambiar por tu contraseña

                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configurar destinatario, remitente, asunto y mensaje
                $destinatario = $infoUsuario->email;
                $remitente = USUARIO;
                $asuntoMail = "Cambio de información de tu Perfil";
                $mensajeMail =
                    "Has cambiado la contraseña de tu perfil recientemente: <br><br>"
                    . "Nueva Contraseña: " . $password . "<br>";

                $mail->setFrom($remitente, $infoUsuario->name);
                $mail->addAddress($destinatario);
                $mail->addReplyTo($remitente, $infoUsuario->name);

                $mail->isHTML(true);
                $mail->Subject = $asuntoMail;
                $mail->Body = $mensajeMail;

                // Enviar correo electrónico
                $mail->send();
            } catch (Exception $e) {
                // Manejar excepciones
                $_SESSION['error'] = 'Error al enviar el mensaje: ' . $e->getMessage();
            }


            $_SESSION['mensaje'] = "Password modificado correctamente";

            #Vuelve corredores
            header("location:" . URL . "perfil");
        }
    }


    # Elimina definitivamente el perfil
    public function delete()
    {

        # Iniciamos o continuamos con la sesión
        session_start();

        # Capa autentificación
        if (!isset($_SESSION['id'])) {

            header("location:" . URL . "login");
        } else {

            try {
                // Configurar PHPMailer
                $infoUsuario = $this->model->getUserId($_SESSION['id']);
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;

                $mail->Username = USUARIO;                                      // Cambiar por tu dirección de correo
                $mail->Password = PASS;                                         // Cambiar por tu contraseña

                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configurar destinatario, remitente, asunto y mensaje
                $destinatario = $infoUsuario->email;
                $remitente = USUARIO;
                $asuntoMail = "Eliminación de tu Perfil";
                $mensajeMail =
                    "Se ha eliminado tu cuenta que tenía la siguiente información: <br><br>"
                    . "Nombre: " . $infoUsuario->name . "<br>"
                    . "Email: " . $infoUsuario->email . "<br>";

                $mail->setFrom($remitente, $infoUsuario->name);
                $mail->addAddress($destinatario);
                $mail->addReplyTo($remitente, $infoUsuario->name);

                $mail->isHTML(true);
                $mail->Subject = $asuntoMail;
                $mail->Body = $mensajeMail;

                // Enviar correo electrónico
                $mail->send();
            } catch (Exception $e) {
                // Manejar excepciones
                $_SESSION['error'] = 'Error al enviar el mensaje: ' . $e->getMessage();
            }

            # Elimino perfil de usuario
            $this->model->delete($_SESSION['id']);

            # Destruyo la sesión
            session_destroy();

            # Salgo de la aplicación
            header('location:' . URL . 'index');
        }
    }
}
