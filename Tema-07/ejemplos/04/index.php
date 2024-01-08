<?php

/*
    Ejemplo 7.4
    Crear sesión
*/



//Inicio de sesión
session_start();

echo "Sesión Iniciada";
echo "<br>";
echo "SID: " . session_id();
echo "<br>";
echo "NAME: " . session_name();