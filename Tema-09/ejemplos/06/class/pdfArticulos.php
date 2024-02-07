<?php

/*
    Hola Mundo

    Parámetros clase
*/

class pdfArticulos extends FPDF
{
    public function Header()
    {
        //Definimos la imagen
        $this->image('logo/logo.png', 10, 5, 20);
        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Arial', 'B', 10);
        //En lugar de indicarle borde con un "1" le indicamos "B" que pondrá subrayado (Bottom)
        $this->Cell(0, 16, iconv('UTF-8', 'ISO-8859-1', 'Listado de Artículos'), 'B', 1, 'R');
        //Salto de línea 
        $this->Ln(5);
    }

    public function Footer()
    {
        //Posición vertical en -10
        $this->SetY(-10);
        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Arial', 'B', 10);
        //Escribimos el nómero de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }

    public function Titulo()
    {

        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Courier', 'B', 12);

        //Ponemos color de fondo naranja
        $this->SetFillColor(169,223,233);

        //Escribimos el texto
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Listado de Artículos'), 0, 1, 'C', true);

        //Salto de línea
        $this->Ln(5);
    }

    public function Cabecera()
    {

        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Courier', 'B', 10);

        //Ponemos color de fondo naranja
        $this->SetFillColor(169,223,233);

        //Escribimos el texto
        $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', 'ID'), 'B', 0, 'R', true);
        $this->Cell(50, 7, iconv('UTF-8', 'ISO-8859-1', 'Descripción'), 'B', 0, 'C', true);
        $this->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', 'Fabricante'), 'B', 0, 'C', true);
        $this->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', 'Categoría'), 'B', 0, 'C', true);
        $this->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', 'Etiquetas'), 'B', 0, 'C', true);
        $this->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', 'Precio'), 'B', 1, 'R', true);

        //Salto de línea
        $this->Ln(5);
    }



}
