<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //Mostrar Cuentas
    public function index()
    {
        return "Lista de Cuentas";
    }

    public function create()
    {
        return "Formulario Crear Cuenta";
    }

    public function update($id)
    {
        return "Formulario Actualizar Cliente " . $id;
    }

    public function delete($id)
    {
        return "Se va a eliminar al cliente " . $id;
    }

    public function show($id)
    {
        return "Formulario Mostrar Cliente " . $id;
    }
}
