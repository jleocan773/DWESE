<?php

/*
    Ejemplo 7.6
    Creación Cookies
*/

//Nombre de la cookie
$nombre_cookie = "nombre";
//Almacena  el nombre
$nombre = "Jonathan";
//Expira a los 60 minutos
$expiración = time() + 60 * 60;

if (setcookie($nombre_cookie, $nombre, $expiración)) {
    echo "Cookie Nombre creada correctamente";
}

echo "<br>";

//Nombre de la cookie
$apellido_cookie = "apellido";
//Almacena  el nombre
$apellido = "León";
//Expira a los 60 minutos
$expiración = time() + 60 * 60;

if (setcookie($apellido_cookie, $apellido, $expiración)) {
    echo "Cookie Apellido creada correctamente";
}

?>