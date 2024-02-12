<?php


//Cabecera. Debe establecerse la cabecera Content-type
$header = "Mime-Versión: 1.0" . "\r\n";
$header .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$header .= "From: J. León <jleocan773@g.educaand.es>" . "\r\n";
$header .= "CC: emailejemploCC@gmail.com" . "\r\n";
$header .= "CCo: emailOculto@gmail.com" . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion();

//Parámetros
//Destinatario
$destino = "jleocan773@g.educaand.es";
//Asunto
$asunto = "Mensaje prueba de email";
//Mensaje
$mensaje = "<h1>UwU</h1>
<b>Aquí</b> aprenderán cómo enviar mensajes con la función mail()
de PHP con código HTML incrustado!";

//Mensaje de email enviado
if (mail($destino, $asunto, $mensaje, $header)) {
    echo ('Email enviado.');
} else {
    echo ('Error de Envío.');
};
