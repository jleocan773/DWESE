<?php

/*
    Hola mundo FPDF dos páginas vertical y apaisada
*/

//Cargamos la clase
require('fpdf/fpdf.php');

//Creamos el objeto FPDF
//p: horizontal, mm: milimetros, A4: tamaño
$pdf = new FPDF('p', 'mm', 'A4');

//Designamos la fuenta del texto, además del estilo y tamaño
$pdf->SetFont('Courier', 'B', 12);

//Añadimos una pagina
$pdf->AddPage();

//Escribimos el texto en una celda de 40x10
//Para escribir UTF-8
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', '¡Hola Mundo ICONV ááááá!'));

//Designamos la fuenta del texto, además del estilo y tamaño
$pdf->SetFont('Arial', 'B', 12);

//Añadimos una pagina
$pdf->AddPage('L');

//Escribimos el texto en una celda de 40x10
//Para escribir UTF-8
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', '¡Hola Mundo ICONV ááááá!'));

//Cerramos el pdf
$pdf->Output();
