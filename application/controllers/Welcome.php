<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'controllers/PadreController.php');
class Welcome extends PadreController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// variables 
		private $_model;
	// metodos magicos
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->model("Acciones/WelcomeModel");
			$this->load->model("Entidades/Usuario");
			$this->load->model("Entidades/Accesos/RolUsuario");
			$this->_model = new WelcomeModel();
		}
	// organizar categorias
		public function ordenCategoria($categorias){
			$nivel = Array();
			foreach ($categorias as $key => $categoria) {
				if($categoria->id_padre_fk == null){
					$nivel[$categoria->idCategoria] = new stdClass();
					$nivel[$categoria->idCategoria]->nombre = $categoria->categoria;
					$nivel[$categoria->idCategoria]->elementos = array();
				}else{
					array_push($nivel[$categoria->id_padre_fk]->elementos, $categoria);
				}
			}
			return $nivel;
		}
	// metodos 
		private function getUserFromPostLogin(){
			$usuario = new Usuario();
			$usuario->setUsuario($_POST['Username']);
			$usuario->setPass($_POST['Password']);
			return $usuario;
		}
	// url 
		public function logout(){
			$_SESSION = null;
			session_destroy();
			redirect('/Welcome/index', 'refresh');
		}
		public function index()
		{	
			$this->load->view('url/welcome/index.php');
		}
		public function home(){
			//require_once(APPPATH."models\Entidades\Usuario.php");
			//$usuarioLogueado   =   $this->session->userdata("usuario");
			//echo "hola";
			
			$usuarioLogueado = unserialize($_SESSION["usuario"]);
			//print_r($usuarioLogueado);
			if(isset($usuarioLogueado)){
				$rolesUsuario = $_SESSION["rolesUsuario"];
				//echo "<pre>";

				//print_r(unserialize($rolesUsuario));
				//print_r($rolesUsuario[0]->_rol);
				//echo "</pre>";
				//print_r($rolesUsuario[0]->rol);
				$usu = new Usuario();
				//print_r($usuarioLogueado);
				$usu->setUsuario($usuarioLogueado->getUsuario());
				$usu->setId($usuarioLogueado->getId());
				//print_r($usu);
				$data = array('usuario' => $usuarioLogueado );
				//echo $usuarioLogueado->getUsuario();
				$this->load->view('url/welcome/home.php',$data);		
			}else{
				redirect('/Welcome/index', 'refresh');
			}

		}
		public function login(){
			try{
				$this->load->model("acciones/PantallaUsuario");
				$pantalla = new PantallaUsuario();				
				$usuario = $this->getUserFromPostLogin();
				$roles = array(); // array de roles del usuario;
				/*
				//print_r($this->input->post);
			
				*/
				//print_r($roles);
				//echo "hola";
				$logueado = $pantalla->login($usuario,$roles);

				if ($logueado){
					//$this->session->userdata('usuario');
					$_SESSION["usuario"] = serialize($usuario);
					$_SESSION["rolesUsuario"] =serialize($roles);
					
					//$this->session->set_userdata("usuario",$usuario);
					//echo "logueado correctamente";
					redirect('/Welcome/Home', 'refresh');
				}else{
					redirect('/Welcome/index', 'refresh');
				}
			}catch(Exception $e){

			}
			//echo "D:";
			
		}
}
