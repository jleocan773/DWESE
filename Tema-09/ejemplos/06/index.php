<?php

//Cargamos clase FPDF
require('fpdf/fpdf.php');
require('class/pdfClientes.php');
require('datos/clientes.php');

//Creamos una clase de pdfclientes
$pdf = new pdfClientes();

//Para la correcta numeración de páginas
$pdf->AliasNbPages();

//Añadimos una página
$pdf->AddPage();

//Definimos el tamaño y el tipo de fuente
$pdf->SetFont('Times', 'B', 16);

//Mostramos el título del documento
$pdf->Titulo();

//Mostramos la cabecera de la tabla
$pdf->Cabecera();

//Definimos el tamaño y el tipo de fuente
$pdf->SetFont('Times', '',   10);

//Mostramos los detalles de cada artículo en el array de artículos
foreach ($clientes as $cliente) {
    $pdf->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['id']), 0, 0, 'R');
    $pdf->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['Apellidos']), 0, 0, 'C');
    $pdf->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['Nombre']), 0, 0, 'C');
    $pdf->Cell(25, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['Teléfono']), 0, 0, 'C');
    $pdf->Cell(35, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['Ciudad']), 0, 0, 'C');
    $pdf->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['DNI']), 0, 0, 'C');
    $pdf->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', $cliente['Email']), 0, 1, 'C');
}


//Cerramos el archivo
$pdf->Output();
