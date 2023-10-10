<?php

$calificacion = 5.5;

if ($calificacion < 5) {
    echo "Insuficiente";
} elseif ($calificacion < 6) {
    echo "Suficiente";
} elseif ($calificacion < 8) {
    echo "Bien";
} elseif ($calificacion < 9) {
    echo "Notable";
} else {
    echo "Sobresaliente";
}
