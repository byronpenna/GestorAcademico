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
}