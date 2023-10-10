<?php

$calificacion = 5.5;

switch (true) {
    case ($calificacion < 5):
        echo "Insuficiente";
        break;
    case ($calificacion < 6):
        echo "Suficiente";
        break;
    case ($calificacion < 8):
        echo "Bien";
        break;
    case ($calificacion < 9):
        echo "Notable";
        break;
    default:
        echo "Sobresaliente";
        break;
}
