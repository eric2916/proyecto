<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionFamilia extends CI_Controller {

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
        if (session_status() !== PHP_SESSION_ACTIVE) { 
			redirect('Welcome/index',"refresh");
		}
		//no se admiten personas sin login
		if(!isset($_SESSION['usuario'])){
			redirect('Welcome/index',"refresh");
		}
		//no se admiten admins ni tutores, tienen otras vistas
		if($_SESSION['rol']!=3){
			redirect('Welcome/index',"refresh");
        }

        $param['informesalumno']=$this->Informe->getAllInformesByAlumno($_SESSION['usuario']['id']);
        $param['alumno']=$_SESSION['usuario'];
        $this->load->view("pageFamilia",$param);



    }

	public function Location(){
		$this->load->view("pageContact");
	}






}