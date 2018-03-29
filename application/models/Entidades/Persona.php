<?php 
class Persona extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public $_idPersona;
	public $_nombres;
	public $_apellidos;
	public $_correo;
	public function llenarPersonaDeFila($row){
		$persona = null;	
		try {
			$persona = new Persona();
			$persona->_idPersona 	= $row->idPersona;
			$persona->_nombres 		= $row->nombres;
			$persona->_apellidos 	= $row->apellidos;
			$persona->_correo 		= $row->correoElectronico;
		} catch (Exception $e) {
			
		}
		return $persona;
	}

}