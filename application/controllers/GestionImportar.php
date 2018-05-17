<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionImportar extends CI_Controller {

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

		$this->load->view('pageImportar');
	}
	

	public function ImportarAlumnos()
	{
		if(isset($_FILES['userfile'])){
			$errors= array();
		   $file_name = $_FILES['userfile']['name'];
		   $file_size =$_FILES['userfile']['size'];
		   $file_tmp =$_FILES['userfile']['tmp_name'];
		   $file_type=$_FILES['userfile']['type'];
		   $tmp= explode('.',$file_name);
		   $file_ext=strtolower(end($tmp));
		   $expensions= array("csv");
		   if(in_array($file_ext,$expensions)=== false){
			  $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		   }
		   if($file_size > 2097152){
			  $errors[]='File size must be excately 2 MB';
		   }
		   if(empty($errors)==true){
			  //subida al server
			  move_uploaded_file($file_tmp,"uploads/".$file_name);
			  //leer el archivo
			  $csv = array_map('str_getcsv', file("uploads/".$file_name));
			  $data['error']=$this->Usuario->CargarNuevosUsuarios($csv);
		   }else{
			  //errror al subir el csv
			 $params['error']='No se podido subir el archivo al servidor';
			 $data['error']=2;

		   }
		}
		$this->load->view('pageImportar',$data);
		 
	}
	public function ImportarItems()
	{
		if(isset($_FILES['userfile'])){
			$errors= array();
		   $file_name = $_FILES['userfile']['name'];
		   $file_size =$_FILES['userfile']['size'];
		   $file_tmp =$_FILES['userfile']['tmp_name'];
		   $file_type=$_FILES['userfile']['type'];
		   $tmp= explode('.',$file_name);
		   $file_ext=strtolower(end($tmp));
		   $expensions= array("csv");
		   if(in_array($file_ext,$expensions)=== false){
			  $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		   }
		   if($file_size > 2097152){
			  $errors[]='File size must be excately 2 MB';
		   }
		   if(empty($errors)==true){
			  //subida al server
			  move_uploaded_file($file_tmp,"uploads/".$file_name);
			  //leer el archivo
			  $csv = array_map('str_getcsv', file("uploads/".$file_name));
			  $data['error']=$this->Item->CargarNuevosItems($csv);
		   }else{
			  //errror al subir el csv
			 $params['error']='No se podido subir el archivo al servidor';
			 $data['error']=2;
			 
		   }
		}
		$this->load->view('pageImportar',$data);
	}

	public function BorrarItems()
	{
		$this->Item->BorrarItems();
		redirect("GestionImportar","refresh");
	}

	public function MostrarUsuarios(){
		$data['usuarios']=$this->Usuario->getAllUsers();
		$this->load->view('pageMostrarUsuarios',$data);
	}
	public function MostrarItems(){
		$data['items']=$this->Item->getAllItems();
		$this->load->view('pageMostrarItems',$data);
	}
}