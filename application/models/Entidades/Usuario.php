<?php
	 class Usuario extends CI_Model
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();
	 		//$this->CI =& get_instance();
	 	}
	 	//	propiedades
	 		public $_idUsuario;
	 		public	$_usuario;
	 		public	$_pass;
	 		public	$_persona;
	 	// get
	 		public function getId(){
	 			return $this->_idUsuario;
	 		}
	 		public function getUsuario(){
	 			return $this->_usuario;
	 		}
	 		public function getPass(){
	 			return $this->_pass;
	 		}
	 	// set
	 		public function setId($valor){
	 			$this->_idUsuario = $valor;
	 		}
	 		public function setUsuario($valor){
	 			$this->_usuario = $valor;
	 		}
	 		public function setPass($valor){
	 			$this->_pass = $valor;
	 		}
	 } 
?>