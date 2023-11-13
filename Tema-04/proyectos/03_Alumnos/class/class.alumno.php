<?php

/*
    Clase Alumno
*/

class Alumno
{
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $fecha_nacimiento;
    public $curso;
    public $asignaturas;

	public function __construct(
		$id = null,
		$nombre = null,
		$apellidos = null,
		$email = null,
		$fecha_nacimiento = null,
		$curso = null,
		$asignaturas = []
	){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->email = $email;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->curso = $curso;
		$this->asignaturas = $asignaturas;
	}

	public function getEdad(){
		$fecha_nacimiento = new DateTime($this->fecha_nacimiento);
		$fecha_hoy = new DateTime();
		$edad =  $fecha_hoy->diff($fecha_nacimiento);
		return $edad->y;
	}


}
