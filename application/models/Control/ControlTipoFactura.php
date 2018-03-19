<?php 
class ControlTipoFactura extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function listar(){
		try {
			$this->load->model("Entidades/TipoFactura");
			$sql = "call sp_controlTipoFactura_listar()";
			$query = $this->db->query($sql);
			$tiposFacturas = array();
			foreach ($query->result() as $key => $row) {
				$tipoFactura = new TipoFactura();
				$tipoFactura->_idTipoFactura = $row->idTipoFactura;
				$tipoFactura->_tipoFactura = $row->tipoFactura;
				array_push($tiposFacturas, $tipoFactura);
			}
			$query->next_result();
			$query->free_result();
			return $tiposFacturas;
		} catch (Exception $e) {
			
		}
	}
}