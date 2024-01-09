<?php

//Iniciamos la sesión
session_start();

if(isset($_SESSION['visitas_home'])){
    $_SESSION['visitas_home']++;
} else {
    $_SESSION['visitas_home'] = 1; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7.1</title>
</head>
<body>
    <ul>
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="acercade.php">Acerca de</a>
        </li>
        <li>
            <a href="servicios.php">Servicios</a>
        </li>
        <li>
            <a href="eventos.php">Eventos</a>
        </li>
        <li>
            <a href="close.php">Ccerrar</a>
        </li>
    </ul>
    <h3>Detalles de la Página</h3>
    <ul>
        <li>
            Página: Home
        </li>
        <li>
            SID: <?= session_id() ?>
        </li>
        <li>
            Nombre Sesión: <?= session_name() ?>
        </li>
        <li>
            Fecha/Hora Inicio Sesión: <?= $variable ?>
        </li>
        <li>
            Visitas Home: <?= $_SESSION['visitas_home']; ?>
        </li>
    </ul>
</body>
</html>