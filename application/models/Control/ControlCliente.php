<?php 
class ControlCliente extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Cliente");
	}
	public function listar(){
		
		try {
			$this->load->model("Entidades/Persona");
			$sql = "call sp_controlCliente_getClientes()";
			$query = $this->db->query($sql);
			$clientes = array();
			foreach ($query->result() as $key => $row) {
				
				$persona = new Persona();
				$cliente = new cliente();
				$cliente->_idCliente = $row->idCliente;
				$persona->_idPersona = $row->idPersona_fk;
				$cliente->_persona = $persona;
				$cliente->_NIT = $row->NIT;
				$cliente->_nombreComercial = $row->nombreComercial;
				array_push($clientes, $cliente);
			}
			$query->next_result();
			$query->free_result();
			return $clientes;
		} catch (Exception $e) {
			
		}
	}
}