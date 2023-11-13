<?php

/*
    Clase Artículo
*/

class Articulo
{
    private $id;
    private $descripcion;
    private $modelo;
    private $marca;
    private $categorias;
    private $unidades;
    private $precio;


    public function __construct(
        $id = null,
        $descripcion = null,
        $modelo = null,
        $marca = null,
        $categorias = null,
        $unidades = null,
        $precio = null
    ) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->categorias = $categorias;
        $this->unidades = $unidades;
        $this->precio = $precio;
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDescripcion() {
		return $this->descripcion;
	}
	
	/**
	 * @param mixed $descripcion 
	 * @return self
	 */
	public function setDescripcion($descripcion): self {
		$this->descripcion = $descripcion;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getModelo() {
		return $this->modelo;
	}
	
	/**
	 * @param mixed $modelo 
	 * @return self
	 */
	public function setModelo($modelo): self {
		$this->modelo = $modelo;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getMarca() {
		return $this->marca;
	}
	
	/**
	 * @param mixed $marca 
	 * @return self
	 */
	public function setMarca($marca): self {
		$this->marca = $marca;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCategorias() {
		return $this->categorias;
	}
	
	/**
	 * @param mixed $categorias 
	 * @return self
	 */
	public function setCategorias($categorias): self {
		$this->categorias = $categorias;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getUnidades() {
		return $this->unidades;
	}
	
	/**
	 * @param mixed $unidades 
	 * @return self
	 */
	public function setUnidades($unidades): self {
		$this->unidades = $unidades;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPrecio() {
		return $this->precio;
	}
	
	/**
	 * @param mixed $precio 
	 * @return self
	 */
	public function setPrecio($precio): self {
		$this->precio = $precio;
		return $this;
	}
}
