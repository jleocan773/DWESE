<?php

/*

    Encabezado: Ha de mostrar la siguiente información: GESBANK 1.0 alineado a la izquierda, Tu Nombre alineado en el centro y 2DAW 23/24 alineado a la derecha. 
    Además deberá mostrar el borde inferior.

    Pie de Página: mostrará el número de la página centrado y con borde superior.
   
    Título del Informe: Se mostrará al principio del informe, en negrita tamaño 12 y mostrará la siguiente información:
    Informe: Listado de Cuentas/Clientes
    Fecha: (Fecha hora actual)

    Encabezado del listado: Mostrará el encabezado de cada una de las columnas del informe, para ello el alumno elegirá las columnas más adecuadas en base a la anchura del informe que será un A4.  
    Mostrará un borde inferior y fondo sombreado. Las columnas han de estar ajustadas a los 190 mm de anchura del A4.
    Contenido: Mostrará en una fila del informe los datos de cada tabla. En caso de llegar al final de página se generará automáticamente una nueva página. Añadir registros suficiente para comprobar 
    que realiza correctamente los saltos de página. Hay que tener en cuenta que cuando pasa página, tiene que lanzar el encabezado del listado.

*/

class pdfClientes extends FPDF
{
    public function Header()
    {
        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Arial', 'B', 10);

        //Ancho de la página
        $anchoPagina = $this->GetPageWidth();

        //Gesbank 1.0 alineado a la izquierda
        $this->Cell(1, 10, iconv('UTF-8', 'ISO-8859-1', 'Gesbank 1.0'), 0, 0, 'L');

        //Nombre en el centro
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Jonathan León Canto'), 'B', 0, 'C');

        //Curso a la derecha
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', '2DAW 23/24'), 0, 1, 'R');

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

        //Ponemos color de fondo
        $this->SetFillColor(169, 223, 233);

        //Título
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Informe: Listado de Clientes'), 0, 1, 'C', true);

        //Celda con la fecha y hora actual
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Fecha: ' . date('d/m/Y H:i')), 0, 1, 'C', true);

        //Salto de línea
        $this->Ln(5);
    }

    public function Cabecera()
    {

        //Definimos el tipo de fuente y tamaño
        $this->SetFont('Courier', 'B', 12);

        //Ponemos color de fondo naranja
        $this->SetFillColor(169, 223, 233);

        //Escribimos el texto
        $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', 'ID'), 'B', 0, 'R', true);
        $this->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', 'Apellidos'), 'B', 0, 'C', true);
        $this->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', 'Nombre'), 'B', 0, 'C', true);
        $this->Cell(25, 7, iconv('UTF-8', 'ISO-8859-1', 'Teléfono'), 'B', 0, 'C', true);
        $this->Cell(35, 7, iconv('UTF-8', 'ISO-8859-1', 'Ciudad'), 'B', 0, 'C', true);
        $this->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', 'DNI'), 'B', 0, 'C', true);
        $this->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', 'Email'), 'B', 1, 'C', true);

        //Salto de línea
        $this->Ln(5);
    }
}
