<?php
class ControlSeccionAlumno extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//
		$this->load->model("Entidades/Academia/SeccionAlumno");
			
	}
	public function obtenerAlumnosDeSeccion($idSeccion){
		try {
			$sql = "call sp_controlSeccionAlumno_obtenerAlumnosDeSeccion(".$idSeccion.")";
			
			$query = $this->db->query($sql);
			//print_r($query->result());	
			$seccionesAlumnos = array();
			foreach ($query->result() as $key => $row) {
				$seccionAlumno = new SeccionAlumno();
				$seccionAlumno = $seccionAlumno->llenarSeccionAlumnoDeFila($row);
				array_push($seccionesAlumnos,$seccionAlumno);

			}
			$query->next_result();
			$query->free_result();
			return $seccionesAlumnos;
		} catch (Exception  $e) {
			return null;
		}
	}
}