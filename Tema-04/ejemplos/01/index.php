<?php

/*

        Programación Orientada a Objetos

    */

class Vehiculo
{

    private $modelo;
    private $nombre;
    private $velocidad;
    private $matricula;


    public function __construct()
    {

        $this->modelo = null;
        $this->nombre = null;
        $this->velocidad = null;
        $this->matricula = null;
    }

    # Setters
    // Se usan para modificar los valores

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }


    # Getters
    // Se usan para mostrar los valores

    public function getModelo($modelo){
        return $this->$modelo;
    }

    public function getNombre($nombre){
        return $this->$nombre;
    }
    
    public function getVelocidad($velocidad){
        return $this->$velocidad;
    }
    
    public function getMatricula($matricula){
        return $this->$matricula;
    }





}
