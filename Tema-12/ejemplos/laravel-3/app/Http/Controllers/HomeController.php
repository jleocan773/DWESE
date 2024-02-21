<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Ya que este controlador solamente va a tener un método, tenemos que usar invoke
    public function __invoke()
    {

        $autor = "León";
        $curso = "23/24";
        $modulo = "DWESE";
        $num_alumnos = 24;
        $alumnos = [
            [
                'id' => 1,
                'nombre' => "Adrián",
                'apellidos' => "Merino Gamaza"
            ],
            [
                'id' => 2,
                'nombre' => "Jorge",
                'apellidos' => "Coronil Villalba"
            ],
            [
                'id' => 3,
                'nombre' => "Jonathan",
                'apellidos' => "León Canto"
            ],
        ];
        $arrayVacio = [];

        return view('home.index', compact('autor', 'curso', 'modulo', 'num_alumnos', 'alumnos', 'arrayVacio'));
    }
}
