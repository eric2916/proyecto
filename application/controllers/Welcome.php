<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	function __construct()
	{   
		parent::__construct();          
		$this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('table');
		$this->load->library('pagination');
		$this->load->database(); //load library database

    }
	public function index()
	{
		$this->load->helper('url');
		$this->load->Model('Usuario');
		$this->load->view('welcome_message');
	}

	public function checkUsuarioForm(){

		$query = $this->Usuario->getCheckUser($this->input->post('login'),$this->input->post('pass_confirmation'));
		if(count ($query)>0){
			//si devuelve 2 lineas es que tiene dos roles 1 y 2
			// si devuleve 1 es que tiene un rol
			if(count($query)>1){
				$_SESSION['usuario']=$query[0];
				$_SESSION['rolmultiple']=true;
				$_SESSION['rol']=$query[0]['idrol'];
				redirect('GestionHome/index',"refresh");
			}else{
				$_SESSION['usuario']=$query[0];
				$_SESSION['rolmultiple']=false;
				$_SESSION['rol']=$query[0]['idrol'];
				if($_SESSION['rol']=="1"){
					redirect('GestionImportar/index',"refresh");
				}else if($_SESSION['rol']=="2"){
					redirect('GestionHome/index',"refresh");
				}else if($_SESSION['rol']=="3"){
					//ir a familias
					redirect('GestionFamilia/index',"refresh");
				}
			}
			
		}else{
			$data["error"]=1;
			$this->load->view('welcome_message',$data);			
		}
	}

}
