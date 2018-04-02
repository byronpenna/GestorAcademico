<?php 
class ControlAnio extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Academia/Anio");	
	}
	public function listar(){
		try {
			$sql = "call sp_controlAnio_listar()";
			$query = $this->db->query($sql);
			$anios = array();
			foreach ($query->result() as $key => $row) {
				$anio = new Anio();
				$anio = $anio->llenarAnioDeFila($row);
				array_push($anios, $anio);
			}
			$query->next_result();
			$query->free_result();
			return $anios;
		} catch (Exception $e) {
			return null;
		}
	}
}