<?php
class Anio extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// propiedades
		public $_idAnioEscolar;
		public $_anio;
	// 
	public function llenarAnioDeFila($row){
		$anio = null;
		try {
			$anio = new Anio();
			$anio->_idAnioEscolar 	= $row->idAnioEscolar;
			$anio->_anio 			= $row->anio;
		} catch (Exception $e) {
				
		}
		return $anio;
	}		
}