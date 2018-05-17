<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keys extends CI_Model {
	/**
	*
	*DAVID LAGUNAS SANCHEZ 31-12-2017
	*
	**/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    protected $_name = 'keys';
    	

	public function getKey($id_user) {
		//$str=md5($password);
		$query_str="SELECT `id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created` FROM `keys` WHERE  `user_id` = ".$id_user." ;";
		$query=$this->db->query($query_str);
		return $query->result_array();		
	}
}
	
	?>