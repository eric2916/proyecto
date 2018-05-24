<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servidorajax extends CI_Controller {
    function __construct()
	{   
		parent::__construct();          
		$this->load->database();
        $this->load->helper(array('form', 'url'));


    }
	public function index()
	{

      
        $users=$this->Usuario->getFalloAjax();           
        echo json_encode($users);
  
	}

}