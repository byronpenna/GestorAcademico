<?php 
class IngresoStockUser extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public $_idStock;
	public $_presentacion; // presentacion de producto
	public $_cantidad;
	public $_fechaIngreso; 
	public $_usuario; // usuario creador
}