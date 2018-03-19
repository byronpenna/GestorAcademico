<?php 

class WelcomeModel extends CI_Model
{
	// funciones magicas
		function __construct()
		{
			parent::__construct();
		}
	// funciones 
		public function Login($value='')
		{
			$sql = "";
		}
		public function getCategorias(){
			$sql = "SELECT * from categorias";
			$this->db->trans_start();
				$query = $this->db->query($sql);
			$this->db->trans_complete();
			return $query->result();
		}
}