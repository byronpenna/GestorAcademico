<?php /**
* 
*/
class Categoria extends CI_Controller
{
	// variables 
		private $_model;
	// metodos magicos
		function __construct()
		{
			parent::__construct();

			$this->load->model("acciones/CategoriaModel");
			$this->_model = new CategoriaModel();
		}
	// url 
		function index($id){
			$data =  array('enlaces' => $this->_model->getEnlaces($id)); 
			$this->load->view("url/categorias/index.php",$data);
		}
}