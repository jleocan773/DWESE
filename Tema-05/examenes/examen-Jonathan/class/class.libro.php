<?php

/*
        clase Libro

        Incluirá un atributo por cada columna de la tabla libro
        No cumple la propiedad de encapsulamiento pero si es preciso definir el constructor

    */

class Libro
{
    public $id;
    public $isbn;
    public $ean;
    public $titulo;
    public $autor_id;
    public $editorial_id;
    public $precio_coste;
    public $precio_venta;
    public $stock;
    public $stock_min;
    public $stock_max;
    public $fecha_edicion;

    public function __construct(
        $id,
        $isbn,
        $ean,
        $titulo,
        $autor_id,
        $editorial_id,
        $precio_coste,
        $precio_venta,
        $stock,
        $stock_min,
        $stock_max,
        $fecha_edicion
    ) {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->ean = $ean;
        $this->titulo = $titulo;
        $this->autor_id = $autor_id;
        $this->editorial_id = $editorial_id;
        $this->precio_coste = $precio_coste;
        $this->precio_venta = $precio_venta;
        $this->stock = $stock;
        $this->stock_min = $stock_min;
        $this->stock_max = $stock_max;
        $this->fecha_edicion = $fecha_edicion;
    }
}
