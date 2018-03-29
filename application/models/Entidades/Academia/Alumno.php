<?php 
class Alumno extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	// propiedades
		public $_idAlumno;
		public $_carnet;
		public $_persona; // obj

		public function llenarAlumnoDeFila($row){
			$alumno = null;
			try {
				$alumno = new Alumno();
				$alumno->_idAlumno 	= $row->idEstudiante;
				$alumno->_carnet 	= $row->carnet;
				$alumno->_persona 	= new Persona();
				$alumno->_persona->_idPersona = $row->persona_fk; 
			} catch (Exception $e) {
				
			}
			return $alumno;
		}
}