<?php
require_once("clases/Duenio.php");
class Mascota {

	private $id;
	private $nombre;
	private $tipo;
	private $foto;
	private $duenio;

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetId(){ return $this->id;}
	public function GetNombre(){ return $this->nombre;}
	public function GetTipo(){return $this->$tipo;}
	public function GetPathFoto(){ return $this->pathFoto;}
	public function GetDuenio(){ return $this->duenio;}

	public function SetId($valor){$this->id = $valor;}
	public function SetNombre($valor){$this->nombre = $valor;}
	public function SetTipo($valor){$this->$tipo = $valor;}
	public function SetPathFoto($valor){$this->pathFoto = $valor;}
	public function SetDuenio($valor){$this->duenio = $valor;}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($id=NULL, $nombre=NULL, $tipo=NULL, $foto=NULL, $duenio=NULL) //
	{
		
		if($id !== NULL){
			$this->id = $id;
			$this->nombre = $nombre;
			$this->tipo = $tipo;
			$this->foto = $foto;
			$this->duenio = new Duenio($duenio[0],$duenio[1]);			
		}
	}

//--------------------------------------------------------------------------------//
    public static function Eliminar($idMascota) {
        //IMPLEMENTAR...
    }

}
