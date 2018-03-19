<?php

class ControlIngresoStockUser extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/IngresoStockUser");			
	}
	public function ingresar($ingresoStockUser){
		try{
			$sql = "call sp_controlIngresoStockUser_Ingresar(
				".$ingresoStockUser->_presentacion->_idPresentacion.",
				".$ingresoStockUser->_cantidad.",
				'".$ingresoStockUser->_fechaIngreso."',
				".$ingresoStockUser->_usuario->_idUsuario."
			)";
			$query = $this->db->query($sql);
		}catch(Exception $x){

		}
		echo $sql;
	}
	public function eliminar($idProducto){
		try {

			$query = $this->db->delete('ingresostockuser',
				array('idStock' => $idProducto)
			); 
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
	public function getConsolidadoByUser($idUsuario){
		try {
			$this->load->model("Entidades/Producto");
			$this->load->model("Entidades/Presentacion");
			$this->load->model("Entidades/IngresoStockUser");
			$sql = "call sp_controlIngresoStockUser_getConsolidadoByUser(".$idUsuario.")";
			$query = $this->db->query($sql);
			$ingresosStocks = array();
			foreach ($query->result() as $key => $row) {
				$ingresoStockUser = new IngresoStockUser();
				$ingresoStockUser->_idStock = $row->idStock;
				$ingresoStockUser->_cantidad = $row->cantidadStock - $row->cantidadVenta;
				
				$presentacion = new Presentacion();
				$presentacion->_idPresentacion = $row->idPresentacion;
				$presentacion->_pesoNeto = $row->pesoNeto;
				$presentacion->_descripcion = $row->descripcion;
				$producto = new Producto();
				$producto->_idProducto = $row->idProducto;
				$producto->_producto = $row->producto;

				$presentacion->_producto = $producto;
				$ingresoStockUser->_presentacion = $presentacion;
				array_push($ingresosStocks, $ingresoStockUser);
			}
			$query->next_result();
			$query->free_result();
			return $ingresosStocks;
		} catch (Exception $e) {
			
		}
	}
	public function getIngresoStockByUser($idUsuario){
		try {
			$this->load->model("Entidades/Producto");
			$this->load->model("Entidades/Presentacion");
			$this->load->model("Entidades/IngresoStockUser");
			$sql = "call sp_controlIngresoStockUser_getIngresostockuser(".$idUsuario.")";
			$query = $this->db->query($sql);
			$ingresosStocks = array();
			foreach ($query->result() as $key => $row) {
				# code...
				//i.fechaIngreso
				$ingresoStockUser = new IngresoStockUser();
				$ingresoStockUser->_idStock = $row->idStock;
				$ingresoStockUser->_cantidad = $row->cantidad;
				$ingresoStockUser->_fechaIngreso = $row->fechaIngreso;
				$presentacion = new Presentacion();
				$presentacion->_idPresentacion = $row->idPresentacion;
				$presentacion->_pesoNeto = $row->pesoNeto;
				
				$producto = new Producto();
				$producto->_idProducto = $row->idProducto;
				$producto->_producto = $row->producto;

				$presentacion->_producto = $producto;
				$ingresoStockUser->_presentacion = $presentacion;
				array_push($ingresosStocks, $ingresoStockUser);
			}
			$query->next_result();
			$query->free_result();
			return $ingresosStocks;
		} catch (Exception $e) {
			
		}
	}
}