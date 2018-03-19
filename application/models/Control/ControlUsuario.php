<?php 

class ControlUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Accesos/Rol");
		$this->load->model("Entidades/Accesos/RolUsuario");
	}
	public function listarUsuarios(){
		try {
			
			$sql = "call sp_controlUsuario_listarUsuarios()";
			$query = $this->db->query($sql);
			$usuarios = array();
			foreach ($query->result() as $key => $row) {
				$usuario = new Usuario();
				$usuario->_idUsuario = $row->idUsuario;
				$usuario->_usuario = $row->usuario;
				array_push($usuarios,$usuario);
				//public $_idUsuario;
	 			//public	$_usuario;
			}
			$query->next_result();
			$query->free_result();
			return $usuarios;
		} catch (Exception $e) {
			return null;
		}
	}
	public function getRolesByUser($idUsuario){
		try {
			$sql = "call sp_controlUsuario_getRolesByUser(
				".$idUsuario.")";
			$query = $this->db->query($sql);
			$rolesUsuario = array();
			foreach ($query->result() as $key => $row) {
				$rolUsuario = new RolUsuario();
				$rol = new Rol();
				$rol = $rol->fillRolByRow($row);
				$usuario = new Usuario();
				$usuario->_idUsuario = $row->idUsuario_fk;
				$rolUsuario->_idRolUsuario = $row->idRolUsuario;
				$rolUsuario->_rol = $rol;
				$rolUsuario->_usuario = $usuario;
				// public $_idRolUsuario;
				// public $_rol; 
				// public $_usuario;
				array_push($rolesUsuario, $rolUsuario);
				
			}
			$query->next_result();
			$query->free_result();
			return $rolesUsuario;

		} catch (Exception $e) {
			return null;
		}
	}
}