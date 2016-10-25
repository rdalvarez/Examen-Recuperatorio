<?php

class Celular {

//agregar atributos necesarios
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $id;
	public $marca;
  	public $so;
  	public $cantSIM;

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
			$this->id = 1;
			$this->marca = $marca;
			$this->so = $so;
			$this->cantSIM = $cantSIM;
		}
	}

//--TOSTRING	
  	public function ToString()
	{
	  	return $this->marca." - ".$this->so." - ".$this->cantSIM."\r\n"; //
	}
//--------------------------------------------------------------------------------//

	//--METODOS DE CLASE
	public function Agregar()
	{ 
		$objJson = json_encode($this); //transformo en json
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/celulares.json", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, $objJson);
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerTodasLasMascotas()
	{

		$ListaDeMascotasLeidos = array();

		//leo todos los productos del archivo
		$archivo=fopen("DB/mascotas.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$mascotas = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$mascotas[0] = trim($mascotas[0]);
			if($mascotas[0] != ""){
				$ListaDeMascotasLeidos[] = new Mascota($mascotas[0], $mascotas[1],$mascotas[2],$mascotas[3],$mascotas[4]);
			}
		}
		fclose($archivo);
		
		return $ListaDeMascotasLeidos;
		
	}
	public static function Modificar($obj)
	{
		$resultado = TRUE;
		
		$ListaDeMascotasLeidos = Mascota::TraerTodosLasMascotas();
		$ListaDeMascotas = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeMascotasLeidos); $i++){
			if($ListaDeMascotasLeidos[$i]->codBarra == $obj->codBarra){//encontre el modificado, lo excluyo
				$imagenParaBorrar = trim($ListaDeMascotasLeidos[$i]->pathFoto);
				continue;
			}
			$ListaDeMascotas[$i] = $ListaDeMascotasLeidos[$i];
		}

		array_push($ListaDeMascotas, $obj);//agrego el producto modificado
		
		//BORRO LA IMAGEN ANTERIOR
		unlink("DB/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("DB/mascotas.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeMascotas AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function Eliminar($codBarra)
	{
		if($codBarra === NULL)
			return FALSE;
			
		$resultado = TRUE;
		
		$ListaDeMascotasLeidos = Producto::TraerTodosLosProductos();
		$ListaDeMascotas = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeMascotasLeidos); $i++){
			if($ListaDeMascotasLeidos[$i]->codBarra == $codBarra){//encontre el borrado, lo excluyo
				$imagenParaBorrar = trim($ListaDeMascotasLeidos[$i]->pathFoto);
				continue;
			}
			$ListaDeMascotas[$i] = $ListaDeMascotasLeidos[$i];
		}

		//BORRO LA IMAGEN ANTERIOR
		unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/productos.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeMascotas AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
//--------------------------------------------------------------------------------//

}