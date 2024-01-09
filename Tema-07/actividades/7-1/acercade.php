<?php

//Iniciamos la sesión
session_name("tarea7_1");
session_start();

if (isset($_SESSION['visitas_acercade'])) {
    $_SESSION['visitas_acercade']++;
} else {
    $_SESSION['visitas_acercade'] = 1;
}

if (!isset($_SESSION['hora_inicio_sesion'])) {
    $_SESSION['hora_inicio_sesion'] = time();
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
            <a href="index.php">Home</a>
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
            <a href="close.php">Cerrar</a>
        </li>
    </ul>
    <h3>Detalles de la Página</h3>
    <ul>
        <li>
            Página: Acerca de
        </li>
        <li>
            SID: <?= session_id() ?>
        </li>
        <li>
            Nombre Sesión: <?= session_name() ?>
        </li>
        <li>
            Fecha/Hora Inicio Sesión: <?= date('Y-m-d H:i:s', $_SESSION['hora_inicio_sesion']) ?>
        </li>
        <li>
            Visitas Acerca De: <?= $_SESSION['visitas_acercade']; ?>
        </li>
    </ul>
</body>

</html>