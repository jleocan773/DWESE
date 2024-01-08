<?php

/*
    Ejemplo 7.5
    Variables
*/



//Contiuamos con la de sesión
session_start();

//Creamos las variables de sesión
$_SESSION['usuario'] = "Jonathan";
$_SESSION['apellidos'] = "León";
$_SESSION['id'] = "123";

echo "Variables creadas correctamente";