<?php 
class Venta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Usuario");
		$this->load->model("Entidades/Presentacion");
		$this->load->model("Entidades/Cliente");
		$this->load->model("Entidades/TipoFactura");
		$this->load->model("Entidades/Producto");
		$this->load->model("Entidades/Usuario");
	}
	public $_idVenta;
	public $_presentacion;
	public $_cantidad;
	public $_cliente;
	public $_fecha; // fecha que se efectuo la venta
	public $_tipoFactura;
	public $_precioUnitario;
	public $_usuario;
	public function fillVentaByRow($row){
		$venta = null;
		try {
			$venta = new Venta();
			$presentacion = new Presentacion();
			$presentacion->_idPresentacion = $row->idPresentacion_fk;
			$presentacion->_descripcion = $row->descripcion;
			$presentacion->_pesoNeto = $row->pesoNeto;
			$cliente = new Cliente();
			$cliente->_idCliente = $row->idCliente_fk;
			$cliente->_nombreComercial = $row->nombreComercial;
			$tipoFactura = new TipoFactura();
			$tipoFactura->_idTipoFactura = $row->idTipoFactura_fk;
			$tipoFactura->_tipoFactura = $row->tipoFactura;
			$producto = new Producto();
			$producto->_idProducto = $row->idProducto;
			$presentacion->_producto = $producto;

			//$producto->_
			// asignaciones
			$venta->_idVenta = $row->idVenta;
			$venta->_presentacion = $presentacion;
			$venta->_cantidad = $row->cantidad;
			$venta->_cliente = $cliente;
			$venta->_fecha = $row->fecha;
			$venta->_tipoFactura = $tipoFactura;
			$venta->_precioUnitario = $row->precioUnitario;
			$venta->_usuario = new Usuario();
			$venta->_usuario->_idUsuario = $row->idUsuario;
			$venta->_usuario->_usuario = $row->usuario;

		} catch (Exception $e) {
			$venta = null;
		}
		return $venta;
	}
}