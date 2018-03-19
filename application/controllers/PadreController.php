<?php 
class PadreController extends CI_Controller
{
	public $_usuarioSession;
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');	
		//print_r($_SESSION);
		if(@$_SESSION["usuario"] != null){
			$this->_usuarioSession = unserialize($_SESSION["usuario"]);
			//echo "logueado";
		}else{
			if(!$this->isLoginUrl()){
				redirect("/welcome","refresh");
			}else{
				//echo "no lo necesita";	
			}
			
		}
	}
	// funciones 
		function getAjaxFrm(){
			$frm = json_decode($_POST["form"]);
			return $frm;
		}
		public function isLoginUrl(){
			$isLogin = false;
			$ci =& get_instance();
			// Muestra el nombre del controlador
		        $controlador 	= $ci->router->fetch_class();
		    // Muestra el nombre del metodo que se esta ejecutando
		        $menu_principal = $ci->router->fetch_method();
		   	if( $controlador == "welcome" && $menu_principal = "index"){
		   		$isLogin = true;
		   	}
		   	return $isLogin;
		}
}