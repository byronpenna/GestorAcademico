<?php 
	class Producto extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		// propiedades
			public $_idProducto;
			public $_producto;
			public $_descripcion;

		// get
			public function getId(){
				return $this->_idProducto;
			}		
			public function getProducto(){
				return $this->_producto;
			}
			public function getDescripcion(){
				return $this->_descripcion;
			}
		// set 
			public function setId($valor){
				$this->_idProducto = $valor;
			}
			public function setProducto($valor){
				$this->_producto = $valor;
			}
			public function setDescripcion($valor){
				$this->_descripcion = $valor;
			}

	}