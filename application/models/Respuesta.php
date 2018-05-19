<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Respuesta extends CI_Model {
	/**
	*
	*DAVID LAGUNAS SANCHEZ 15-05-2018
	*
	**/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    protected $_name = 'Respuesta';

    public function getRespuestas() {
		$query_str="SELECT * FROM Respuesta ";
		$query=$this->db->query($query_str);
		return $query->result_array();	
    }

}