<?php 
class PantallaUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Control/ControlUsuario");
	}
	public function login(&$usuario,&$roles){ // retorna un objeto usuario
		try{
			$usuarioRetorno = new Usuario();
			$controlUsuario = new ControlUsuario();
			$sql = "CALL sp_pantallaUsuario_login('".$usuario->getUsuario()."','".$usuario->getPass()."')";
			$param = array(
				$usuario->getUsuario(), 
				$usuario->getPass()
			);
			$query = $this->db->query($sql);
			$row = $query->row();
			$query->next_result();
			$query->free_result();
			$retorno = false;
			if($row->logueo == 1){
				$retorno = true;
				$usuario->setId($row->idUsuario);
				$usuario->setUsuario($row->usuario);
				$roles = $controlUsuario->getRolesByUser($usuario->_idUsuario);		
			}
			return $retorno;
		}catch(Exception $e){

		}
	}
}