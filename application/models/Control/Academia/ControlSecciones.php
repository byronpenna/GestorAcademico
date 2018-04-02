<?php 

class ControlSecciones extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Academia/Seccion");
	}
	public function listarPorAnio($idAnio){
		try {
			$sql = "call sp_controlSecciones_listarPorAnio(".$idAnio.")";
			$query = $this->db->query($sql);
			$secciones = array();
			foreach ($query->result() as $key => $row) {
				$seccion = new Seccion();
				$seccion = $seccion->llenarSeccionDeFila($row);
				array_push($secciones, $seccion);
			}
			$query->next_result();
			$query->free_result();
			return $secciones;
		} catch (Exception $e) {
			
		}
	}
}