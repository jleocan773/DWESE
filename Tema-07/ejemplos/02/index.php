<?php

/*
    Ejemplo 7.2
*/

//Inicio de sesión
session_start();

echo "Sesión Iniciada";
echo "<br>";
echo "SID: " . session_id();
echo "<br>";
echo "NAME: " . session_name();