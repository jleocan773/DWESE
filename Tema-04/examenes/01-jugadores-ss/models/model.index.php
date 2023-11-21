<?php

    # Creo el objeto de la clase arrayUsuarios
    $jugadores = new arrayJugadores;

    # Obtengo arrays de paises, posiciones y equipos
    $paises = arrayJugadores::getPaises();
    $posiciones = arrayJugadores::getPosiciones();
    $equipos = arrayJugadores::getEquipos();

    # Cargo los datos
    $jugadores->getDatos();

    # Obtengo la tabla de usuarios mediante método getArray()
    $t_jugadores = $jugadores->getTabla();

?>