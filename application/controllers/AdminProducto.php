<?php
include_once(APPPATH.'controllers/PadreController.php'); 
class AdminProducto extends PadreController
{
	public $_controlProducto;
	public $_controlIngresosStocks;
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Entidades/Accesos/RolUsuario");
		
		// modelos
			$this->load->model("Entidades/Usuario");
			$this->load->model("Entidades/Presentacion");
			$this->load->model("Entidades/IngresoStockUser");
			// controles 
				$this->load->model("Control/ControlIngresoStockUser");
				$this->load->model("Control/ControlProducto");
				$this->load->model("Control/ControlCliente");
				$this->load->model("Control/ControlTipoFactura");
		// clases control
		$this->_controlProducto = new ControlProducto();
		$this->_controlIngresosStocks = new ControlIngresoStockUser();
		$this->_controlCliente = new ControlCliente();
		$this->_controlTipoFactura = new ControlTipoFactura();
	}
	public function venta(){
		$this->load->model("Entidades/Venta");
		$this->load->model("Entidades/Cliente");
		$this->load->model("Entidades/TipoFactura");
		$this->load->model("Control/ControlVenta");
		/*$obj = json_decode($_POST["form"]);
		$frm = new stdClass();
		foreach ($obj as $key => $value) {
			$frm->$key = $value;
		}*/
		$control = new ControlVenta();
		$venta = new Venta();
		$venta->_presentacion = new Presentacion();
		$venta->_presentacion->_idPresentacion = $_POST["cbPresentacion"];
		$venta->_cantidad = $_POST["txtCantidad"];
		$venta->_cliente = new Cliente();
		$venta->_cliente->idCliente = $_POST["cbCliente"];
		$venta->_fecha = $_POST["txtFecha"]; 
		$venta->_tipoFactura = new TipoFactura();
		$venta->_tipoFactura->_idTipoFactura = $_POST["cbTipoFactura"];
		$venta->_precioUnitario = $_POST["txtPrecioUnitario"];
		
		$usuarioSession = unserialize($_SESSION["usuario"]);
		$usuario = new Usuario();
		$usuario->_idUsuario = $usuarioSession->_idUsuario;
		
		
		$venta->_usuario = $usuario;
		$retorno = $control->ingresar($venta);
		if($retorno){
			//echo
			$url = site_url("/AdminProducto/sacarProductoUsuario");
			echo '<meta http-equiv="refresh" content="0; URL='.$url.' ">'; 
			//redirect('/AdminProducto/sacarProductoUsuario', 'refresh');
		}else{
			echo "Ocurrio un error con la venta, por favor verificar stock de producto";
		}
		//print_r($venta);
	}
	public function eliminarStockProducto(){
		$this->load->model("Control/ControlIngresoStockUser");
		$frm = json_decode($_POST["form"]);
		$obj = new stdClass();
		foreach ($frm as $key => $value) {
			$obj->$key = $value;
		}
		$control = new ControlIngresoStockUser();
		//print_r($obj);
		$retorno = $control->eliminar($obj->idProducto);
		$data = array('estado' => $retorno );
		echo json_encode($data);
	}
	public function ingresarStockProducto(){
		// Accion ingresar disparada por un formulario 
		$this->load->model("Control/ControlIngresoStockUser");
		$presentacion = new Presentacion();
		$control = new ControlIngresoStockUser();
		$presentacion->_idPresentacion = $_POST["cbPresentacion"];
		$ingresoStockUser = new IngresoStockUser();
		$ingresoStockUser->_presentacion = $presentacion;
		$ingresoStockUser->_cantidad = $_POST["txtCantidad"];
		$ingresoStockUser->_fechaIngreso = $_POST["txtFecha"];
		$usuarioSession = unserialize($_SESSION["usuario"]);
		$usuario = new Usuario();
		$usuario->_idUsuario = $usuarioSession->_idUsuario;
		$ingresoStockUser->_usuario = $usuario;
		$control->ingresar($ingresoStockUser);
		//redirect('/AdminProducto/ingresoProductoUsuario', 'refresh');
		$url = site_url("/AdminProducto/ingresoProductoUsuario");
		echo '<meta http-equiv="refresh" content="0; URL='.$url.' ">';
		//print_r($ingresoStockUser);
	}
	public function sacarProductoUsuario(){
		$productos 		= $this->_controlProducto->listar();
		//print_r($productos);
		$clientes 		= $this->_controlCliente->listar();
		$tiposFacturas 	= $this->_controlTipoFactura->listar();
		$this->load->model("Control/ControlVenta");
		$this->load->model("Control/ControlUsuario");
		$controlVenta = new ControlVenta();
		$controlUsuario = new ControlUsuario();
		$usuarioSession = unserialize($_SESSION["usuario"]);
		$usuario = new Usuario();
		$usuario->_idUsuario = $usuarioSession->_idUsuario;
		$ventas = $controlVenta->getVentasByUser($usuario->_idUsuario);
		//print_r($ventas);
		$rolesUsuario = unserialize($_SESSION["rolesUsuario"]);
		$usuarios = $controlUsuario->listarUsuarios();
		$data = array(
			'productos' => $productos,
			'clientes' => $clientes,
			'tiposFacturas' => $tiposFacturas,
			'ventas' => $ventas,
			'rolesUsuario' => $rolesUsuario,
			'usuarios' => $usuarios
		);
		
		$this->load->view('url/AdminProducto/sacarProductoUsuario.php',$data);
	}
	public function ingresoProductoUsuario(){
		
		$productos 				= $this->_controlProducto->listar();
		$usuarioSession 		= unserialize($_SESSION["usuario"]);
		$usuario 				= new Usuario();
		$usuario->_idUsuario 	= $usuarioSession->_idUsuario;
		$ingresosStocks 		= $this->_controlIngresosStocks->getIngresoStockByUser($usuario->_idUsuario);
		$consolidado 			= $this->_controlIngresosStocks->getConsolidadoByUser($usuario->_idUsuario);
		
		$data = array(
			'productos' => $productos,
			'ingresosStocks' => $ingresosStocks,
			'consolidado' => $consolidado
		);
		$this->load->view('url/AdminProducto/ingresoProductoUsuario.php',$data);
	}
	// ajax
	public function ajax_getPresentaciones(){
		//header('Content-Type: application/json');
		$this->load->model("Control/ControlPresentacion");
		$control = new ControlPresentacion();
		$frm = json_decode($_POST["form"]);
		//print_r($frm);
		$obj = new stdClass();
		foreach ($frm as $key => $value) {
			$obj->$key = $value;
		}
		//print_r($frm);
		$presentaciones = $control->listarPresentacionByProducto($obj->idProducto);
		//echo "presentaciones: ";
		//print_r($presentaciones);
		$data = array(
			'estado' => true,
			'presentaciones' => $presentaciones
		);
		//print_r($presentaciones);
		//echo "--------------------";
		echo json_encode($data);
	}
}