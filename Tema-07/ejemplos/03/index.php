<?php

/*
    Ejemplo 7.3
    Personalizar sesión
*/

//Personalizar la sesion
session_id("GatoBoludo");
session_name("Vodka");

//Inicio de sesión
session_start();

echo "Sesión Iniciada";
echo "<br>";
echo "SID: " . session_id();
echo "<br>";
echo "NAME: " . session_name();