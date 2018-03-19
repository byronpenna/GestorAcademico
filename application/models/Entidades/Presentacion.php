<?php 
class Presentacion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// propiedades
		public $_idPresentacion;
		public $_producto;
		public $_descripcion;
		public $_pesoNeto; // peso en gramos
	// get 
		public function getId(){
			return $this->_idPresentacion;
		}
		public function getProducto(){
			return $this->_producto;
		}
		public function getPesoNeto(){
			return $this->_pesoNeto;
		}
	// set
		public function setId($valor){
			$this->_idPresentacion = $valor;
		}
		public function setProducto($valor){
			$this->_producto = $valor;
		}
		public function setPesoNeto($valor){
			$this->_pesoNeto = $valor;
		}

}