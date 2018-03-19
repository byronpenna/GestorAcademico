<?php
include_once(APPPATH.'controllers/PadreController.php'); 
class VentaController extends PadreController
{
	function __construct()
	{	
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Entidades/Venta");
		$this->load->model("Control/ControlVenta");
		$this->load->model("Entidades/Usuario");


		// modelos
				
	}
	public function ajax_getVentasByDates(){
		$control = new ControlVenta();
		//print_r($_POST);
		$frm = json_decode($_POST["form"]);
		$obj = new stdClass();
		foreach ($frm as $key => $value) {
			$obj->$key = $value;
		}
		$usuarioSession = unserialize($_SESSION["usuario"]);
		$usuario = new Usuario();
		//print_r($obj);
		$idUsuarioBusqueda = null;
		if($obj->cbUsuario <> -1){
			$idUsuarioBusqueda = $obj->cbUsuario;
		}
		$usuario->_idUsuario = $idUsuarioBusqueda; // $usuarioSession->_idUsuario;
		$r = $control->getVentasByDate($obj->txtFechaInicio,$obj->txtFechaFin,$usuario->_idUsuario);
		$retorno = new  stdClass();
		$retorno->estado = true;
		$retorno->ventas = $r;
		echo json_encode($retorno);
	}
	public function ajax_eliminarVenta(){	
		$control = new ControlVenta();
		
		$frm = json_decode($_POST["form"]);
		$obj = new stdClass();
		foreach ($frm as $key => $value) {
			$obj->$key = $value;
		}
		
		$venta = new Venta();
		$venta->idVenta = $obj->idVenta;
		//print_r($obj);
		$retorno = new stdClass();
		$r = $control->eliminar($venta);
		$retorno->estado = $r;
		echo json_encode($retorno);
		/*if($retorno){
			$url = site_url("/AdminProducto/sacarProductoUsuario");
			echo '<meta http-equiv="refresh" content="0; URL='.$url.' ">'; 
			//
		}else{
			echo "Ocurrio un error eliminando la venta";
		}*/
	}
}