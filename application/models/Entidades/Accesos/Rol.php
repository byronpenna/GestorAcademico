<?php
class Rol extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public $_idRol;
	public $_rol;
	public function fillRolByRow($row){
		$rol = null;
		try {
			$rol = new Rol();
			$rol->_idRol = $row->idRol;
			$rol->_rol = $row->rol;
		} catch (Exception $e) {
			
		}
		return $row;
	}
}