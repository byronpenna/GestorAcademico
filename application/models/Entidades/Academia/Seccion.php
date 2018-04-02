<?php
class Seccion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Academia/NivelGrado");
		$this->load->model("Entidades/Academia/Anio");
	}
	// propiedades 
		public $_idSeccion;
		public $_seccion;
		public $_nivelGrado; // obj
		public $_anioEscolar; // obj
		public $_cupo; 
	// 
		public function llenarSeccionDeFila($row){
			$seccion = NULL;
			try {
				$seccion = new Seccion();
				$seccion->_idSeccion 					= $row->idSeccion;
				$seccion->_seccion 						= $row->seccion;
				$seccion->_nivelGrado 					= new NivelGrado();
				$seccion->_nivelGrado->_idNivelGrado 	= $row->idNivelGrado_fk;
				$seccion->_anioEscolar 					= new  Anio();
				$seccion->_anioEscolar->_idAnioEscolar 	= $row->idAnioEscolar_fk;
				$seccion->_cupo 						= $row->cupo;
			} catch (Exception $e) {
				
			}
			return $seccion;
		}
}