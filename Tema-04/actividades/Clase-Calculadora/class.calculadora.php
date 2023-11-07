<?php


class CalculadoraEjercicio
{
    private $valor1;
    private $valor2;
    private $operacion;
    private $resultado;

    public function __construct(
        $valor1 = 0,
        $valor2 = 0,
        $operacion = null,
        $resultado = 0
    ) {
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
        $this->operacion = $operacion;
        $this->resultado = $resultado;
    }

    public function sumar(){
        $this->resultado = $this->valor1 + $this->valor2;
        $this->operacion = "Suma";
        return $this->resultado;
    }

    public function restar(){
        $this->resultado = $this->valor1 - $this->valor2;
        $this->operacion = "Resta";
        return $this->resultado;
    }

    public function multiplicacion(){
        $this->resultado = $this->valor1 * $this->valor2;
        $this->operacion = "Multiplicación";
        return $this->resultado;
    }

    public function división(){
        $this->resultado = $this->valor1 / $this->valor2;
        $this->operacion = "División";
        return $this->resultado;
    }




	/**
	 * @return mixed
	 */
	public function getValor1() {
		return $this->valor1;
	}
	
	/**
	 * @param mixed $valor1 
	 * @return self
	 */
	public function setValor1($valor1): self {
		$this->valor1 = $valor1;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getValor2() {
		return $this->valor2;
	}
	
	/**
	 * @param mixed $valor2 
	 * @return self
	 */
	public function setValor2($valor2): self {
		$this->valor2 = $valor2;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getOperacion() {
		return $this->operacion;
	}
	
	/**
	 * @param mixed $operacion 
	 * @return self
	 */
	public function setOperacion($operacion): self {
		$this->operacion = $operacion;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getResultado() {
		return $this->resultado;
	}
	
	/**
	 * @param mixed $resultado 
	 * @return self
	 */
	public function setResultado($resultado): self {
		$this->resultado = $resultado;
		return $this;
	}
}

