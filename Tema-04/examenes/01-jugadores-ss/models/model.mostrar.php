<?php

    # Creo el objeto de la clase arrayUsuarios
    $jugadores = new arrayJugadores;

    # Obtengo arrays de paises, posiciones y equipos
    $paises = arrayJugadores::getPaises();
    $posiciones = arrayJugadores::getPosiciones();
    $equipos = arrayJugadores::getEquipos();

    # Cargo los datos
    $jugadores->getDatos();

    # Obtengo el indice del  artículo que deseo mostrar
    $indice = $_GET['indice'];

    #Pillamos los datos del alumno según índice
    $jugador = $jugadores->read($indice);
?>
