<?php 
class Cliente extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// propiedades
		public $_idCliente;
		public $_persona; // obj
		public $_NIT;
		public $_NCR;
		public $_nombreComercial;
}