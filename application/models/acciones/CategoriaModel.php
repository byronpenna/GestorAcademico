<?php 
class CategoriaModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// funciones
		function getEnlaces($idCategoria){
			$sql = "SELECT * 
					from enlaces
					where id_categoria_fk = ".$idCategoria."";
			$this->db->trans_start();
				$query = $this->db->query($sql);
			$this->db->trans_complete();
			return $query->result();
		}
}