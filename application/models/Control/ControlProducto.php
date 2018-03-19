<?php 
class ControlProducto extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Entidades/Producto");
	}
	public function listar(){
		try{
			
			$producto = new Producto();
			$productos =  array();
			$query = $this->db->query("select * from productos");
			foreach ($query->result() as $key => $row) {
				//print_r($row);
				$producto = new Producto();
				$producto->setId($row->idProducto);
				$producto->setProducto($row->producto);
				$producto->setDescripcion($row->descripcion);
				array_push($productos, $producto);
			}
			
			return $productos;
		}catch(Exception $e){
			print_r($e);
		}
	}
}