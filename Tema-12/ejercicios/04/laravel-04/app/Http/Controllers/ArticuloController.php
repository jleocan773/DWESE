<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = [
            (object) 
            [
                'id' => 1,
                'descripcion' => 'Portátil HP MD12345',
                'categoria' => 0,
                'unidades' => 12,
                'precio_coste' => 550.50,
                'precio_venta' => 800
            ],
            (object) [
                'id' => 2,
                'descripcion' => 'Tablet - Samsung Galaxy Tab A (2019)',
                'categoria' => 5,
                'unidades' => 200,
                'precio_coste' => 300,
                'precio_venta' => 400
            ],
            (object) [
                'id' => 3,
                'descripcion' => 'Impresora multifunción - HP',
                'categoria' => 4,
                'unidades' => 2000,
                'precio_coste' => 69,
                'precio_venta' => 80
            ],
            (object) [
                'id' => 4,
                'descripcion' => 'TV LED 40" - Thomson 40FE5606 - Full HD',
                'categoria' => 3,
                'unidades' => 300,
                'precio_coste' => 259,
                'precio_venta' => 350
            ],
            (object) [
                'id' => 5,
                'descripcion' => 'PC Sobremesa - Acer Aspire XC-830',
                'categoria' => 1,
                'unidades' => 20,
                'precio_coste' => 329,
                'precio_venta' => 350
            ]

        ];

        return view('articulos.articulos', ['articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
