<?php
$mes_numero = date('m');

switch ($mes_numero) {
    case '01':
        $mes_en_espanol = 'Enero';
        break;
    case '02':
        $mes_en_espanol = 'Febrero';
        break;
    case '03':
        $mes_en_espanol = 'Marzo';
        break;
    case '04':
        $mes_en_espanol = 'Abril';
        break;
    case '05':
        $mes_en_espanol = 'Mayo';
        break;
    case '06':
        $mes_en_espanol = 'Junio';
        break;
    case '07':
        $mes_en_espanol = 'Julio';
        break;
    case '08':
        $mes_en_espanol = 'Agosto';
        break;
    case '09':
        $mes_en_espanol = 'Septiembre';
        break;
    case '10':
        $mes_en_espanol = 'Octubre';
        break;
    case '11':
        $mes_en_espanol = 'Noviembre';
        break;
    case '12':
        $mes_en_espanol = 'Diciembre';
        break;
    default:
        $mes_en_espanol = 'Error';
}

echo "El mes actual es: " . $mes_en_espanol;
?>
