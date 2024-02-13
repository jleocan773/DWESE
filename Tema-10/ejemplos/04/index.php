<?php

//Cargar clase PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




//En caso de error se lanza la excepción
try {
    //Creamos un objeto de la clase PHPMailer
    $mail = new PHPMailer(true);

    //Configuraciones
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "quoted-printable";

    //Usuario, que es el correo completo
    $mail->Username = "jleocan773@g.educaand,es";

    //Contraseña, que es el código de acceso
    $mail->Password = "3862 9166";

    //Servidor SMTP
    $mail->SMTPDebug = 2;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Cabecera del email
    $destinatario = "jleocan773@g.educaand,es";
    $remitente = "jleocan773@g.educaand,es";
    $asunto = "Prueba";
    $mensaje = "Prueba de email MIAU MIAU MIAU MIAU MIAU MIAU MIAU";

    $mail->setFrom($remitente, 'J. León');
    $mail->addAddress($destinatario, 'Señor Maullidos');
    $mail->addReplyTo($remitente, 'Jony');
    //Con copia
    $mail->addCC($destinatario);
    //Con copia oculta
    $mail->addBCC($destinatario);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;


    //Enviamos le mensaje
    $mail->send();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
