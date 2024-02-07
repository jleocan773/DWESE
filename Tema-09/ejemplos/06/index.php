<?php

/*
    Hola mundo Clase FPDF
    Mostrar una imagen en pdf
*/

//Cargamos clase FPDF
require('fpdf/fpdf.php');
require('class/pdfArticulos.php');
require('datos/articulos.php');

//Creamos una clase de pdfArticulos
$pdf = new pdfArticulos();

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

//Mostramos los detalles de cada artículo en el array de artículos
foreach ($articulos as $articulo) {
    $pdf->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['id']), 0, 0, 'R');
    $pdf->Cell(50, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Descripcion']), 0, 0, 'C');
    $pdf->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Fabricante']), 0, 0, 'C');
    $pdf->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Categoria']), 0, 0, 'C');
    //Etiquetas es un array, hay que convertirlo en string con implode()
    $pdf->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', implode(', ', $articulo['Etiquetas'])), 0, 0, 'C');
    $pdf->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Precio']), 0, 1, 'R');
}


//Cerramos el archivo
$pdf->Output();
