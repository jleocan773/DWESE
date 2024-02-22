<?php

require_once 'class/class.contacto.php';

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/auth.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Contacto extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    public function render()
    {

        //Iniciar sesión
        session_start();

        # Comprobar si vuelvo de un registro no validado
        if (isset($_SESSION['error'])) {
            # Mensaje de error
            $this->view->error = $_SESSION['error'];

            # Recupero array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
        }

        # Comprobar si existe el mensaje
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        $this->view->render('contacto/index');
    }

    public function validar()
    {
        //Iniciar sesión
        session_start();

        //1. Seguridad. Saneamos los datos del formulario

        //Si se introduce un campo vacío, se le otorga "nulo"
        $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $asunto = filter_var($_POST['asunto'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $textoMensaje = filter_var($_POST['textoMensaje'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        //2. Validación de campos obligatorios
        $errores = [];

        if (empty($nombre)) {
            $errores['nombre'] = 'El campo nombre es obligatorio';
        }

        if (empty($email)) {
            $errores['email'] = 'El campo email es obligatorio';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Formato email incorrecto';
        }

        if (empty($asunto)) {
            $errores['asunto'] = 'El campo asunto es obligatorio';
        }

        if (empty($textoMensaje)) {
            $errores['textoMensaje'] = 'El campo mensaje es obligatorio';
        }

        //3. Comprobar validación
        if (!empty($errores)) {
            // Si hay errores, almacenarlos en la sesión y redirigir al formulario de contacto
            $_SESSION['error'] = "Formulario no validado";
            $_SESSION['errores'] = $errores;
            header('Location:' . URL . 'contacto');
            exit();
        } else {
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
                $asuntoMail = $asunto;
                $mensajeMail = $textoMensaje;

                $mail->setFrom($remitente, $nombre);
                $mail->addAddress($destinatario);
                $mail->addReplyTo($remitente, $nombre);

                $mail->isHTML(true);
                $mail->Subject = $asuntoMail;
                $mail->Body = $mensajeMail;

                // Enviar correo electrónico
                $mail->send();

                // Redirigir a la página de éxito
                $_SESSION['mensaje'] = 'Mensaje enviado correctamente.';
                header('Location:' . URL . 'contacto');
                exit();
            } catch (Exception $e) {
                // Manejar excepciones
                $_SESSION['error'] = 'Error al enviar el mensaje: ' . $e->getMessage();
                header('Location:' . URL . 'contacto');
                exit();
            }
        }
    }
}
