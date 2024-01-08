<?php

/*
    Ejemplo 7.5
    Eliminar sesión
*/


//Continuo con  la sesión
session_start();

echo "Sesión Continuada";
echo "<br>";
echo "SID: " . session_id();
echo "<br>";
echo "NAME: " . session_name();

//Elimino la sesión
session_destroy();
//Elimino también todas las variables de sesión
session_unset();

echo "<br>";
echo "<br>";
echo "Sesión Eliminada";
echo "<br>";
echo "SID: " . session_id();
echo "<br>";
echo "NAME: " . session_name();