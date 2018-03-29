<?php
include_once(APPPATH.'controllers/PadreController.php'); 
class AlumnoController extends PadreController
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Control/ControlPersona");
		$this->load->model("Control/Academia/ControlAlumno");
	}
	public function ingresaralumno(){
		try {
			$control = new ControlAlumno();
		} catch (Exception $e) {
			echo "ocurrio un error";	
		}
	}
	public function	agregar(){
		try {
			$controlPersona = new ControlPersona();
			$controlAlumno = new ControlAlumno();
			$personas = $controlPersona->listar();
			$alumnos = $controlAlumno->listar();
			//print_r($personas);
			$data = array(
				'personas' => $personas, 
				'alumnos' => $alumnos
			);
			$this->load->view('url/Alumno/Index.php',$data);

		} catch (Exception $e) {
			
		}
	}

}