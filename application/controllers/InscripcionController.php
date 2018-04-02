<?php 
include_once(APPPATH.'controllers/PadreController.php'); 
class InscripcionController extends PadreController
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Control/Academia/ControlAnio");
	}
	function obtenerSeccionesDeAnio(){
		try {
			$this->load->model("Control/Academia/ControlSecciones");
			$control = new ControlSecciones();
			
			$frm = json_decode($_POST["form"]);
			//print_r($frm);
			$obj = new stdClass();
			foreach ($frm as $key => $value) {
				$obj->$key = $value;
			}
			//echo json_encode($obj);
			
			//echo "hola";
			$secciones = $control->listarPorAnio(1);
			$data = array(
				'estado' => true,
				'secciones' => $secciones );
			echo json_encode($data);

		} catch (Exception $e) {
			
		}
	}
	function inscribir(){
		try {
			$controlAnios = new ControlAnio();
			$data = array(
				'anios' => $controlAnios->listar(),
			);
			$this->load->view('url/Inscripcion/inscribir.php',$data);

		} catch (Exception $e) {
			echo "ocurrio un error";
		}
	}
}