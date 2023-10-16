<?php

$equipos = [
    [
        'id' => 1,
        'nombre' => 'Real Madrid',
        'ciudad' => 'Madrid'
    ],
    [
        'id' => 2,
        'nombre' => 'Real Betis',
        'ciudad' => 'Sevilla'
    ],
    [
        'id' => 3,
        'nombre' => 'FC Barcelona',
        'ciudad' => 'Barcelona'
    ]
];

// foreach($equipos as $equipo){
//     print_r($equipo);
//     echo "<br>";

// }


foreach ($equipos as $equipo) {
    echo implode(", ", $equipo);
    echo "<br>";
}
