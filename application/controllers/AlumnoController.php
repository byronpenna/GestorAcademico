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
		$retorno = false;
		try {
			$alumno = new Alumno();
			$alumno->_carnet 		= $_POST["txtCarnet"];
			$alumno->_NIE 			= $_POST["txtNIE"];
			$alumno->_persona 		= new Persona();
			$alumno->_persona->_idPersona = $_POST["cbPersona"];
			$control = new ControlAlumno();
			$retorno = $control->agregar($alumno);
		} catch (Exception $e) {
			echo "ocurrio un error";	
		}
		echo $retorno;
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