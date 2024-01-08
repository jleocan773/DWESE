<?php

/*
    Ejemplo 7.5
    Mostrar Variables
*/



//Contiuamos con la de sesión
session_start();

//Creamos las variables de sesión
print_r($_SESSION);

echo "<br>";
echo "Usuario: " . $_SESSION["usuario"];
echo "<br>";
echo "Apellido: " . $_SESSION["apellidos"];
echo "<br>";
echo "ID: " . $_SESSION["id"];
