<?php

/*
    Hola mundo FPDF Variables y Fondo de Celda
*/

//Cargamos la clase
require('fpdf/fpdf.php');

//Declaro variables
$id = 1;
$nombre = 'Pepe';
$apellidos = 'Perez Galván';
$hotel = "Trivago";


//Creamos el objeto FPDF
//p: horizontal, mm: milimetros, A4: tamaño
$pdf = new FPDF('p', 'mm', 'A4');

//Designamos la fuenta del texto, además del estilo y tamaño
$pdf->SetFont('Courier', 'B', 12);

//Color de fondo de celda a naranja
$pdf->SetFillColor(255, 165, 0);

//Añadimos una pagina
$pdf->AddPage();

//Escribimos el texto en una celda de 40x10
//Para escribir UTF-8
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'ID:  '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $id), 1, 1);
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Nombre: '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $nombre), 1, 1);
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Apellidos: '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $apellidos), 1, 1);
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Hotel: '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $hotel), 1, 1);

//Cerramos el pdf
$pdf->Output();
