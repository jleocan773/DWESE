<?php

/*
    Hola mundo FPDF
*/

//Cargamos la clase
require('fpdf/fpdf.php');

//Creamos el objeto FPDF
$pdf = new FPDF();

//Añadimos una pagina
$pdf->AddPage();

//Designamos la fuenta del texto, además del estilo y tamaño
$pdf->SetFont('Arial', 'B', 16);

//Escribimos el texto en una celda de 40x10
//Para escribir UTF-8
$pdf->Cell(40, 10, mb_convert_encoding('Hola Álvaro', 'ISO-8859-1', 'UTF-8'));

//Imprimimos el pdf
$pdf->Output();
