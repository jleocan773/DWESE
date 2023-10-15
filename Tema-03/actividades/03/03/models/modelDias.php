<?php
$numeros = [];
$contador = 1;
for ($i = 1; $i <= 10; $i++) {
    $columnas = [];
    for ($j = 1; $j <= 10; $j++) {
        $columnas[] = $contador;
        $contador += 1;
    }
    $numeros[] = $columnas;
}