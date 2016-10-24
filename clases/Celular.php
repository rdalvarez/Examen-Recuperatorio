<?php
class Celular {

//agregar atributos necesarios
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $id;
	private $marca;
  	private $so;
  	private $cantSIM;

//--GETTERS Y SETTERS
  	public function GetId(){return $this->id;}
	public function GetMarca(){return $this->marca;}
	public function GetSO(){return $this->so;}
	public function GetCantSIM(){return $this->cantSIM;}

	public function SetId($valor){$this->id = $valor;}
	public function SetMarca($valor){$this->marca = $valor;}
	public function SetSo($valor){$this->so = $valor;}
	public function SetCantSIM($valor){$this->cantSIM = $valor;}

//--------------------------------------------------------------------------------//
    public function __construct($marca=NULL, $so=NULL, $cantSIM=NULL)
	{
		if($marca !== NULL && $so!==NULL && $cantSIM!==NULL){
			$this->marca = $marca;
			$this->so = $so;
			$this->cantSIM = $cantSIM;
		}
	}
}