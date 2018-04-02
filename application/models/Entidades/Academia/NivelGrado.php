<?php 
class NivelGrado extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		
	}
	// propiedades
		public $_idNivelGrado;
		public $_nombre;
	// 
		public function llenarNivelGradoDeFila($row){
			$nivelGrado = null;
			try {
				$nivelGrado = new NivelGrado();
				$nivelGrado->_idNivelGrado 	= $row->idNivelGrado;
				$nivelGrado->_nombre 		= $row->nombre;
			} catch (Exception $e) {
				
			}
			return $nivelGrado;
		}
}