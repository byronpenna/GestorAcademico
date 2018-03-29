<?php
class ControlPersona extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Persona");
	}
	public function listar(){
		try {
			$sql = "call sp_controlPersona_getPersonas()";
			$query = $this->db->query($sql);
			$personas = array();
			foreach ($query->result() as $key => $row) {
				$persona = new Persona(); 
				$persona = $persona->llenarPersonaDeFila($row);
				array_push($personas, $persona);
			}
			$query->next_result();
			$query->free_result();
			return $personas;		
		} catch (Exception $e) {
			return null;
		}
			
	}
}