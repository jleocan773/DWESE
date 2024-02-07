<?php

/*
    Hola mundo Clase FPDF
    Mostrar una imagen en pdf
*/

//Cargamos clase FPDF
require('fpdf/fpdf.php');
//require('class/pdfArticulos.php');

$pdf = new FPDF();

//Definimos el tamaño y el tipo de fuente
$pdf->SetFont('Times','B',16);

//Añadimos una página
$pdf->AddPage();

//Añadimos una imagen
$pdf->Image('logo/logo.png',0,0,80);

//Cerramos el archivo
$pdf->Output();

