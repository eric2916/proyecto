<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionInforme extends CI_Controller {

    function __construct()
	{   
		parent::__construct();          
		$this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('table');
		$this->load->library('pagination');
		$this->load->database(); //load library database
		if (session_status() !== PHP_SESSION_ACTIVE) { 
			redirect('Welcome/index',"refresh");
		}
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
        if($_SESSION['rolmultiple']==false && $_SESSION['rol']==1){
            //no se admiten solo admins
			redirect('Welcome/index',"refresh");
		}

		$this->load->view('pageInforme');
    }
    public function cargarinforme($info)
	{

		//no se admiten personas sin login
		if(!isset($_SESSION['usuario'])){
			redirect('Welcome/index',"refresh");
		}
		//no se admiten alumnos
		if($_SESSION['rol']==3){
			redirect('Welcome/index',"refresh");
        }
        if($_SESSION['rolmultiple']==false && $_SESSION['rol']==1){
            //no se admiten solo admins
			redirect('Welcome/index',"refresh");
        }

		//info user tiene dos parametros el 1 el id del alumno el 2 la evaluacion
		$infouser=explode('x', $info, 2);
		$param['alumno']=$this->Usuario->getUser($infouser[0]);
		$param['eval']=$infouser[1];
        $param['items']=$this->Item->getAllItems();
		$_SESSION['totalitems']=count($param['items']);
		$_SESSION['eval']=$infouser[1];
		$_SESSION['alumno']=$infouser[0];
		$this->load->view('pageInforme',$param);
	}
	public function generarinforme()
	{
		if (session_status() !== PHP_SESSION_ACTIVE) { 
			redirect('Welcome/index',"refresh");
		}
		//no se admiten personas sin login
		if(!isset($_SESSION['usuario'])){
			redirect('Welcome/index',"refresh");
		}
		//no se admiten alumnos
		if($_SESSION['rol']==3){
			redirect('Welcome/index',"refresh");
        }
        if($_SESSION['rolmultiple']==false && $_SESSION['rol']==1){
            //no se admiten solo admins
			redirect('Welcome/index',"refresh");
		}
		
		$resultados=array();
        
		for($i=0;$i<$_SESSION['totalitems'];$i++){
			$j=$i +1 ;
			$resultados[$j] = intval($this->input->post('radio' . ($i+1)) );
		}
		$_SESSION['curso']=$this->input->post('curso');
			
		

		$OK=$this->Informe->GuardarInforme($resultados,$_SESSION['totalitems'],$_SESSION['eval'],$_SESSION['alumno'],$_SESSION['usuario']['id'],$_SESSION['curso']);

		if($OK){
			$param['alumno']=$this->Usuario->getUser($_SESSION['alumno']);
			$param['eval']=$_SESSION['eval'];
			$param['items']=$this->Item->getAllItems();
			// construir texto
			$arrayOrdenada=array();
			for($indexvalor=1;$indexvalor<6;$indexvalor++){
				foreach ($resultados as $iditem => $valor) {
					if($indexvalor ==  $valor ){
						$arrayOrdenada[$iditem]=$valor;
					}
				}
			}
		//	var_dump($arrayOrdenada);exit;
			$informeprovisional=$this->redactarinforme($arrayOrdenada);
			$this->Informe->updateTexto($_SESSION['eval'],$_SESSION['alumno'],$_SESSION['usuario']['id'],$_SESSION['curso'],$informeprovisional);
			$param['informeprovisional']=$informeprovisional;
			$param['alumno']=$this->Usuario->getUser($_SESSION['alumno']);
			$param['eval']=$_SESSION['eval'];
			$param['items']=$this->Item->getAllItems();
			$this->load->view('pageInforme',$param);

		}else{
			$param['alumno']=$this->Usuario->getUser($_SESSION['alumno']);
			$param['eval']=$_SESSION['eval'];
			$param['items']=$this->Item->getAllItems();
			$this->load->view('pageInforme',$param);
			echo "<script>alert('ATENCION\nERROR INTERNO NO SE HA GENERADO EL INFORME')</script>";

		}
		//$this->load->view('pageInforme',$param);
	}

	public function guardarinformerevisado(){
		$texto=$this->input->post("informeprovisional");
		$Informe=$this->Informe->getInforme($_SESSION['eval'],$_SESSION['curso'],$_SESSION['alumno'],$_SESSION['usuario']['id']);
		$this->Informe->updateTextoRevisado($Informe[0]['idInforme'],$texto);
		redirect('GestionHome/index',"refresh");

	}
	public function redactarinforme($arrayOrdenada){
		$respuestas=$this->Respuesta->getRespuestas();
		$alum=$this->Usuario->getUser($_SESSION['alumno']);
		$flag1=0;
		$informe="";
		if($alum[0]['sexo']==0){
			$informe="Evaluación del alumno " .  ucfirst(strtolower ($alum[0]['nombre'])) ." ".  ucfirst( strtolower ($alum[0]['apellido1'])) . ": \n"  ;
		}else{
			$informe="Evaluación de la alumna " .  ucfirst(strtolower ($alum[0]['nombre']))." ".   ucfirst(strtolower ($alum[0]['apellido1'])) .": \n";
		}
		$informe=$informe. "ADQUISICIÓN DE HABITOS: \n";
		$arrayOrdenadaCat1=array();
		$arrayOrdenadaCat2=array();
		foreach($arrayOrdenada as $key => $value){
			if( $key <= (count($arrayOrdenada)/2) ){
				$arrayOrdenadaCat1[$key]=$value;
			}else{
				$arrayOrdenadaCat2[$key]=$value;
			}
		}	

		if (in_array(1, $arrayOrdenadaCat1))
  		{
			$flag1=1;
			$informe=$informe. "Hay que reforzarlo en ";
			foreach($arrayOrdenadaCat1 as $key => $value){
				if( $value==1 && ($key<= 10 ) ){
					$informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				}
			}		
		  }
		if (in_array(2, $arrayOrdenadaCat1))
  		{
			if($flag1==0){
				$informe=$informe. "Muestra poco interés en ";
				$flag1=1;
			}else{
				$informe=$informe. " muestra poco interés en ";
			}
			foreach($arrayOrdenadaCat1 as $key => $value){
				if( $value==2 && ($key <= 10)){
					$informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				}
			}
		  }
		if (in_array(3, $arrayOrdenadaCat1))
  		{
			if($flag1==0){
				$informe=$informe. "Tiene habilidades y destrezas en ";
				$flag1=1;
			}else{
				$informe=$informe. " tiene habilidades y destrezas en ";
			}
			
			foreach($arrayOrdenadaCat1 as $key => $value){
				if( $value==3 && ($key <=10 )){
					$informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				}
			}

  		}
		if (in_array(4, $arrayOrdenadaCat1))
  		{
			if($flag1==0){
				$informe=$informe. "Es trabajador, persevera y coopera en ";
				$flag1=1;
			}else{
				$informe=$informe. " es trabajador, persevera y coopera en ";
			}
		
			foreach($arrayOrdenadaCat1 as $key => $value){
				if( $value==4 && ($key <=10 )){
					$informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				}
			}
		  }
		if (in_array(5, $arrayOrdenadaCat1))
  		{
			if($flag1==0){
				$informe=$informe. "Posee gran potencial en ";
				$flag1=1;
			}else{
				$informe=$informe. " posee gran potencial en ";
			}
			
			foreach($arrayOrdenadaCat1 as $key => $value){
				if( $value==5 && ($key <=10 )){
					$informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				}
			}
		}
		$informe=rtrim($informe,", ");
		$informe=$informe. " .";
		$informe=$informe. "\n";
		$informe=$informe. "ACTITUD EN CLASE: \n";
		$flag2=0;
		if (in_array(1, $arrayOrdenadaCat2))
		{
		  $flag2=1;
		  $informe=$informe. "Muestra poco interés en ";
		  foreach($arrayOrdenadaCat2 as $key => $value){
			  if( $value==1 && ($key > 10 )){
				  $informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
			  }
		  }		
		}
	  if (in_array(2, $arrayOrdenadaCat2))
		{
			if($flag2==0){
				$informe=$informe. "Necesita apoyo en ";
				$flag2=1;
			}else{
				$informe=$informe. " necesita apoyo en ";
			}
		 
		  foreach($arrayOrdenadaCat2 as $key => $value){
			  if( $value==2 && ($key > 10 )){
				  $informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
	
			  }
		  }
		}
	  if (in_array(3, $arrayOrdenadaCat2))
		{
			if($flag2==0){
				$informe=$informe. "Muestra avance en ";
				$flag2=1;
			}else{
				$informe=$informe. " muestra avance en ";
			}
		 
		  foreach($arrayOrdenadaCat2 as $key => $value){
			  if( $value==3 && ($key > 10 )){
				  $informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				 
			  }
		  }

		}
	  if (in_array(4, $arrayOrdenadaCat2))
		{
			if($flag2==0){
				$informe=$informe. "Muestra madurez y compromiso en ";
				$flag2=1;
			}else{
				$informe=$informe. " muestra madurez y compromiso en ";
			}
		  
		  foreach($arrayOrdenadaCat2 as $key => $value){
			  if( $value==4 && ($key > 10 )){
				  $informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				 
			  }
		  }
		}
	  if (in_array(5, $arrayOrdenadaCat2))
		{
			if($flag2==0){
				$informe=$informe. "Hace un excelente trabajo en ";
				$flag2=1;
			}else{
				$informe=$informe. " hace un excelente trabajo en ";
			}
		 
		  foreach($arrayOrdenadaCat2 as $key => $value){
			  if( $value==5 && ($key > 10 )){
				  $informe=$informe. " " . $respuestas[($key-1)]["texto"] . " , ";
				 
			  }
		  }
	  }
		//Calculate the average.
		$average = array_sum($arrayOrdenada) / count($arrayOrdenada);
		$informe=rtrim($informe,", ");
		$informe=$informe. " .";
		$informe=$informe. "\n";
		$informe=$informe. "OBSERVACIONES: \n";
		if($average<2){
			$informe=$informe.  "Podemos decir que sigue con cierta dificultad los contenidos trabajados en el aula .";
		}else if($average>=2 &&  $average<3){
			$informe=$informe.  "Podemos decir que sigue con normalidad los contenidos trabajados en el aula .";
		}else{
			$informe=$informe.  "Podemos decir que sigue con facilidad los contenidos trabajados en el aula .";
		}
		return $informe;
	}

}