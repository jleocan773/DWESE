<?php

/*
    Clase arrayArticulos.php

    Simulará la tabla de articulos

    Es un array donde cada elemento es una instancia de la clase Articulo

*/


class ArrayArticulos
{
    private $tabla;


    public function __construct()
    {
        $this->tabla = [];
    }


    /**
     * Get the value of tabla
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     *
     * @return  self
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }


    static public function getMarcas()
    {
        $marcas = [
            'Xiaomi',
            'Acer',
            'Aoc',
            'Nokia',
            'Apple',
            'Lenovo',
            'IBM'
        ];

        asort($marcas);
        return $marcas;
    }

    static public function getCategorias()
    {
        $categorias = [
            'Portátiles',
            'PCs sobremesa',
            'Componentes',
            'Pantallas',
            'Impresoras',
            'Tablets',
            'Móviles',
            'Fotografía',
            'Imagen'
        ];

        asort($categorias);

        return $categorias;
    }

    public function getDatos()
    {

        //Articulo 1
        $articulo = new Articulo(
            1,
            'Portátil HP MD12345',
            'HP 15-1234-20',
            0,
            [1, 2, 3],
            12,
            550.50
        );

        //Se añade el artículo a la tabla
        $this->tabla[] = $articulo;

        //Articulo 2
        $articulo = new Articulo(
            2,
            'Smartphone Samsung Galaxy S21',
            'Samsung S21-7890',
            4,
            [2, 4],
            8,
            799.99
        );

        // Se añade el artículo a la tabla
        $this->tabla[] = $articulo;


        //Articulo 3
        $articulo = new Articulo(
            3,
            'Tablet Apple iPad Pro',
            'iPad Pro 12.9-2022',
            2,
            [1, 3],
            5,
            1099.00
        );

        // Se añade el artículo a la tabla
        $this->tabla[] = $articulo;

        //Articulo 4
        $articulo = new Articulo(
            4,
            'Laptop Dell XPS 13',
            'Dell XPS 13-9370',
            5,
            [2, 3],
            10,
            1199.99
        );

        // Se añade el artículo a la tabla
        $this->tabla[] = $articulo;

        //Articulo 5
        $articulo = new Articulo(
            5,
            'Cámara Canon EOS R5',
            'Canon EOS R5',
            2,
            [1, 4],
            3,
            3499.00
        );

        // Se añade el artículo a la tabla
        $this->tabla[] = $articulo;
    }

    //Lo declaramos estáticos porque no cambian datos
    static public function mostrarCategorias($categorias, $categoriasArticulo)
    {

        $arrayCategorias = [];

        foreach ($categoriasArticulo as $indice) {

            $arrayCategorias[] = $categorias[$indice];
        }

        asort($arrayCategorias);
        return $arrayCategorias;
    }

    public function create(Articulo $data)
    {
        $this->tabla[] = $data;
    }

    public function delete($indice)
    {

        unset($this->tabla[$indice]);
        $this->tabla = array_values($this->tabla);
    }

    public function articuloParaEditar($indice)
    {
        return $this->tabla[$indice];
    }

    public function update($indice, Articulo $data)
    {
        $this->tabla[$indice] = $data;
    }
}
