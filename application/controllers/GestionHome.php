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

		
		//=================================================
		$params = array();
		$alumnosajax=$this->Usuario->getFalloAjax();
		for($i=0;$i<count($alumnosajax);$i++){
			$params['alumnosajax'][$i]=$alumnosajax[$i]['apellido1'] . " "  . $alumnosajax[$i]['apellido2'] . " , " . $alumnosajax[$i]['nombre'] ;
		}
		$limit_per_page = 3;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->Usuario->get_total($_SESSION['usuario']['id']);

		if ($total_records > 0) 
		{
			// get current page records
			$params["results"] = $this->Usuario->get_current_page_records($limit_per_page, $start_index,$_SESSION['usuario']['id']);          
			$config['base_url'] = base_url() . 'index.php/GestionHome/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] 	= '<div class="container pagging text-center"><nav><ul class="pagination navigation" >';
			$config['full_tag_close'] 	= '</ul></nav></div>';
			$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link" >';
			$config['num_tag_close'] 	= '</span></li>';
			$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close'] 	= '</span></li>';
			$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close'] 	= '</span></li>';
			
			$this->pagination->initialize($config);
			
			// build paging links
			$params["links"] = $this->pagination->create_links(); 
		} 

		//==================================================
		$this->load->view('pageHome',$params);
	}
	public function filtro()
    {
		 	//echo $this->input->post('inpDesc') . " <br> ";
		  	//echo $this->input->post('inpFechaIni'). " <br> ";
		  	//echo $this->input->post('inpFechaFin'). " <br> ";
				
			$alumnosajax=$this->Usuario->getFalloAjax();
			for($i=0;$i<count($alumnosajax);$i++){
				  $params['alumnosajax'][$i]=$alumnosajax[$i]['apellido1'] . " "  . $alumnosajax[$i]['apellido2'] . " , " . $alumnosajax[$i]['nombre'] ;
			}
			
			$nombre=$this->input->post('inpnombre');
			 
			$nombrecompleto=explode(" ",$nombre);

			//exit();	
			$params = array();
			$limit_per_page = 3;
			$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$total_records = $this->Usuario->get_total_filter($nombrecompleto[0],$_SESSION['usuario']['id']);
			if ($total_records > 0) 
			{
				// get current page records
				$params["results"] = $this->Usuario->get_current_page_records_filter($limit_per_page, $start_index,$nombrecompleto[0],$_SESSION['usuario']['id']);  
				$config['base_url'] = base_url() . 'index.php/GestionHome/index';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;
				 // custom paging configuration
				$config['num_links'] = 2;
				$config['use_page_numbers'] = TRUE;
				$config['reuse_query_string'] = TRUE;

				$config['full_tag_open'] 	= '<div class="container pagging text-center"><nav><ul class="pagination navigation" >';
				$config['full_tag_close'] 	= '</ul></nav></div>';
				$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link" >';
				$config['num_tag_close'] 	= '</span></li>';
				$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close'] 	= '</span></li>';
				$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close'] 	= '</span></li>';

				$this->pagination->initialize($config);

				// build paging links
				$params["links"] = $this->pagination->create_links();
        	}


			
			$this->load->view('pageHome',$params);
	}
	public function Logout()
	{
		session_unset();
		$this->load->view('welcome_message');
	}


}