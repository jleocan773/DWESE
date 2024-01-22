<?php

/*
    Creamos una clase para cada tabla
    las propiedades públicas y una propiedad para cada columna

    No respetará la propiedad de encapsulamiento.
*/

class classCliente
{
    public $id;
    public $apellidos;
    public $nombre;
    public $telefono;
    public $ciudad;
    public $dni;
    public $email;

    public function __construct(
        $id = null,
        $apellidos = null,
        $nombre = null,
        $telefono = null,
        $ciudad = null,
        $dni = null,
        $email = null
    ) {
        $this->id = $id;
        $this->apellidos = $apellidos;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->dni = $dni;
        $this->email = $email;
    }
}
