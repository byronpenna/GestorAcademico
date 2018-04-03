<?php
class SeccionAlumno extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Academia/Alumno");
		$this->load->model("Entidades/Academia/Seccion");
			
	}
	// propiedades
			public $_idSeccionAlumno;
			public $_seccion; // obj
			public $_alumno; // obj
	// 
	public function llenarSeccionAlumnoDeFila($row){
		$seccionAlumno = null;
		try {
			$seccionAlumno	= new SeccionAlumno();
			$seccionAlumno->_idSeccionAlumno = $row->idSeccionAlumno;
			$seccionAlumno->_seccion = new Seccion();
			$seccionAlumno->_seccion->_idSeccion = $row->idSeccion_fk;
			$seccionAlumno->_alumno = new Alumno();
			$seccionAlumno->_alumno->_idAlumno = $row->idAlumno_fk;

		} catch ( Exception $e) {
			
		}
		return $seccionAlumno;
	}
}