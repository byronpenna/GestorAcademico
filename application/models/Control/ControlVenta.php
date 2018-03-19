<?php
class ControlVenta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Venta");
	}
	public function eliminar($venta){
		$retorno = true;
		try {
			$sql = "call sp_controlVenta_eliminar(".$venta->idVenta.")";
			$query = $this->db->query($sql);

		} catch (Exception $e) {
			$retorno = false;
		}
		return $retorno;
	}
	public function ingresar($venta){
		$retorno = true;
		try {
			$sql ="call sp_controlVenta_ingresar(".$venta->_presentacion->_idPresentacion.",
			".$venta->_cantidad.",
			".$venta->_cliente->idCliente.",
			'".$venta->_fecha."',
			".$venta->_tipoFactura->_idTipoFactura.",
			".$venta->_precioUnitario.",
			".$venta->_usuario->_idUsuario.");";
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
	public function getVentasByDate($inicio,$fin,$idUsuario){
		try {
			if ($idUsuario == null){
				$strIdUsuario = "null";
			}else{
				$strIdUsuario = $idUsuario;
			}
			$sql = "call sp_controlVenta_searchByDate('".$inicio."','".$fin."',".$strIdUsuario.")";
					//echo "La consulta es: ".$sql;
			//echo $sql;		
			$query = $this->db->query($sql);
			$ventas = array();
			foreach ($query->result() as $key => $row) {
				$venta = new Venta();
				$venta = $venta->fillVentaByRow($row);
				//print_r($venta);	
				array_push($ventas, $venta);
			}	
			$query->next_result();
			$query->free_result();
			return $ventas;
		} catch (Exception $e) {
			return null;
		}
	}
	public function getVentasByUser($idUsuario){
		try {
			$sql = "call sp_controlVenta_ventasByUser(".$idUsuario.")";
			
			$query = $this->db->query($sql);
			$ventas = array();
			foreach ($query->result() as $key => $row) {
				// objetos dependientes
				//print_r($row);
				$venta = new Venta();
				$venta = $venta->fillVentaByRow($row);
				//print_r(	$venta );
				//echo "Esta fue la venta";

				/*
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
				*/
				array_push($ventas, $venta);
			}	
			$query->next_result();
			$query->free_result();
			return $ventas;
		} catch (Exception $e) {
			
		}
		
	}
}