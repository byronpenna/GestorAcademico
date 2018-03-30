<?php 
class ControlAlumno extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Academia/Alumno");
	}
	public function listar(){
		try {
			$sql = "call sp_controlEstudiante_listar()";
			$query = $this->db->query($sql);
			$alumnos = array();
			foreach ($query->result() as $key => $row) {
				$alumno = new Alumno();
				$alumno = $alumno->llenarAlumnoDeFila($row);
				$alumno->_persona->_nombres = $row->nombres;;
				$alumno->_persona->_apellidos = $row->apellidos;
				
				array_push($alumnos,$alumno);
			}
			$query->next_result();
			$query->free_result();
			return $alumnos;
		} catch (Exception $e) {
			return null;
		}	
	}
	public function agregar($alumno){
		$retorno = true;
		try {
			$sql = "call sp_controlEstudiante_ingresar(
				'".$alumno->_carnet."',
				".$alumno->_persona->_idPersona."
			)";
			$query = $this->db->query($sql);
			$row = $query->row();
			if($row->estado <> 0){
				$retorno = false;
			}	
		} catch (Exception $e) {
			$retorno = false;
		}
		return $retorno;
	}
}