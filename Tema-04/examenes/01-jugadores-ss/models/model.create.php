<?php

$jugadores = new arrayJugadores;
$jugadores->getDatos();
$paises = arrayJugadores::getPaises();
$posiciones = arrayJugadores::getPosiciones();
$equipos = arrayJugadores::getEquipos();

// Obtener los valores del formulario
$nuevo_id = $_POST['id'];
$nuevo_nombre = $_POST['nombre'];
$nuevo_numero = $_POST['numero'];
$nuevo_pais = $_POST['pais'];
$nuevo_equipo = $_POST['equipo'];
$nuevo_posiciones = $_POST['posiciones'];
$nuevo_contrato = $_POST['contrato'];

// Crear un nuevo jugador
$nuevoJugador = new Jugador(
    $nuevo_id,
    $nuevo_nombre,
    $nuevo_numero,
    $nuevo_pais,
    $nuevo_equipo,
    $nuevo_posiciones,
    $nuevo_contrato
);

// Agregar el nuevo jugador a la tabla de jugadores
$jugadores->create($nuevoJugador);

$t_jugadores = $jugadores->getTabla();

$notificacion = "Jugador creado con éxito";

?>