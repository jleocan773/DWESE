<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //Mostrar todos los clientes
    public function index()
    {
        return "Lista Clientes";
    }

    public function create()
    {
        return "Formulario Crear Cliente";
    }

    public function update($id)
    {
        return "Formulario Actualizar Cliente: " . $id;
    }

    public function delete($id)
    {
        return "Se va a eliminar al cliente con id: " . $id;
    }

    public function show($id)
    {
        return "Formulario Mostrar Cliente: " . $id;
    }
}
