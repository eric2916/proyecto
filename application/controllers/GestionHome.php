<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionHome extends CI_Controller {

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
		//no se admiten personas sin login
		if(!isset($_SESSION['usuario'])){
			redirect('Welcome/index',"refresh");
		}
		//no se admiten alumnos
		if($_SESSION['rol']==3){
			redirect('Welcome/index',"refresh");
		}

		$this->load->view('pageHome');
	}
	
	public function Logout()
	{
		unset($_SESSION['usuario']);
		unset($_SESSION['rol']);
		unset($_SESSION['rolmultiple']);
		$this->load->view('welcome_message');
	}


}