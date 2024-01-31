<?php

$alumnos = [
    [
        1,
        'juan',
        'perez garcia',
        '2daw',
        'El Bosque'
    ],
    [
        2,
        'pedro',
        'romero garcía',
        '1daw',
        'Ubrique'
    ],
    [
        3,
        'maria',
        'sanchez garcia',
        '1daw',
        'Villamartín'
    ]
];

//Abro el fichero si no existe lo crea, si existe, lo sobreescribe
$alumnos_csv = fopen('csv/alumnos.csv', 'ab');

foreach ($alumnos as $alumno) {
    fputcsv($alumnos_csv, $alumno);
}

fclose($alumnos_csv);

echo "Fichero alumnos_csv creado con exito";


