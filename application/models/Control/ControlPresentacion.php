<?php 
	class ControlPresentacion extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function listarPresentacionByProducto($idProducto){
			try{
				$this->load->model("Entidades/Presentacion");
				$query = $this->db->get_where("presentaciones",array('idProducto_fk' =>$idProducto ));
				$presentaciones = array();
				foreach ($query->result() as $key => $row) {
					
					$presentacion = new Presentacion();
					$presentacion->setId(utf8_encode($row->idPresentacion));
					$presentacion->setPesoNeto(utf8_encode($row->pesoNeto));	
					$presentacion->_descripcion = $row->descripcion;
					//print_r($presentacion);
					array_push($presentaciones, $presentacion);
				}
				//echo "a salir";
				//print_r($presentaciones);
				return $presentaciones;
			}catch(Excepction $x){

			}
		}
	}