<?php

/*
    Ejemplo 7.7
    Mostrar Cookie
*/

//Comprobamos si las cookie existe
if (isset($_COOKIE['nombre']) && isset($_COOKIE['apellido'])) {
    //Accedo a la cookie
    //echo $_COOKIE['datos_personales'];
    print_r($_COOKIE);
    echo "<br>";
} else echo "La cookie no existe";


