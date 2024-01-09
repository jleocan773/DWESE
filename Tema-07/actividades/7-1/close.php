<?php

//Iniciamos la sesión
session_name("tarea7_1");
session_start();

$visitas_totales = 0; 

if(isset($_SESSION['visitas_home'])){
    $visitas_totales += $_SESSION['visitas_home'];
}
if(isset($_SESSION['visitas_servicios'])){
    $visitas_totales += $_SESSION['visitas_servicios'];
}
if(isset($_SESSION['visitas_eventos'])){
    $visitas_totales += $_SESSION['visitas_eventos'];
}
if(isset($_SESSION['visitas_acercade'])){
    $visitas_totales += $_SESSION['visitas_acercade'];
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
            Página: Cerrar
        </li>
        <li>
            SID: <?= session_id() ?>
        </li>
        <li>
            Nombre Sesión: <?= session_name() ?>
        </li>
        <li>
            Visitas Totales: <?= $visitas_totales; ?>
        </li>
        <li>
            Fecha/Hora Inicio Sesión: <?= date('Y-m-d H:i:s', $_SESSION['hora_inicio_sesion']) ?>
        </li>

        <?php

        $hora_cierre_sesion = time();
        $duracion_sesion = $hora_cierre_sesion - $_SESSION['hora_inicio_sesion'];
        session_destroy();

        ?>
        <li>
            Fecha/Hora Fin Sesión: <?= date('Y-m-d H:i:s',$hora_cierre_sesion) ?>
        </li>
        <li>
            Duración Sesión: <?= $duracion_sesion ?> segundos.
        </li>

    </ul>
</body>

</html>