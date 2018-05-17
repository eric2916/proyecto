<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Model {
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
	protected $_name = 'usuarios';
	
	public function getCheckUser($username,$password) {
		$str=md5($password);
		$query_str="SELECT Usuario .*,rolusuario.idrol FROM Usuario left join rolusuario on Usuario .id=rolusuario.idusuario WHERE username='$username' and password='$str' ";
		$query=$this->db->query($query_str);
		return $query->result_array();		
	}
	public function CargarNuevosUsuarios($csv) {
		foreach($csv as $key => $Usuario)
		{   
		    if(count($Usuario)<9){
				return 0;
			}

			$Existe=$this->yaExiste($Usuario);  
 
			
			if(count($Existe)==0){
				$res=$this->insertUsuario($Usuario);
				if($res==FALSE){
					return 0;
				}
			}
		} 
		return 1;
	}
	public function insertUsuario($Usuario){

			$this->load->helper('security');
			$this->db->trans_start(); # Starting Transaction
			$this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 
		
			$this->db->set('id',null);
			$this->db->set('username', strtoupper ($Usuario[0]));
			$this->db->set('password',do_hash($Usuario[4], 'md5'));
			$this->db->set('nombre', strtoupper ($Usuario[1]));
			$this->db->set('apellido1',strtoupper ( $Usuario[2]));
			$this->db->set('apellido2', strtoupper ($Usuario[3]));
			$this->db->set('sexo', intval($Usuario[5]));
			$this->db->set('email', $Usuario[8]);
		
			$this->db->insert('Usuario');# Inserting data
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete(); # Completing transaction
			/*Optional*/
			if ($this->db->trans_status() === FALSE) {
				# Something went wrong.
				$this->db->trans_rollback();
				return FALSE;
			} else {
				# Everything is Perfect. 
				# Committing data to the database.

				$this->db->set('idrol', intval($Usuario[6]));
				$this->db->set('idusuario', $insert_id);
				$this->db->insert('rolusuario');# Inserting data
				if( $Usuario[7]!=-1){
					$this->db->set('idrol', intval($Usuario[7]));
					$this->db->set('idusuario', $insert_id);
					$this->db->insert('rolusuario');# Inserting data				
				}

				$this->db->trans_commit();
				return TRUE;
			}
		
	}
	public function yaExiste($Usuario){
		$query_str="SELECT * FROM Usuario WHERE email='". $Usuario[8] ."' ;"; 
		//echo $query_str; exit;
		$query=$this->db->query($query_str);
		return $query->result_array();
		
	}
	public function getAllUsers() {
		$query_str="SELECT Usuario .*,rolusuario.idrol FROM Usuario left join rolusuario on Usuario .id=rolusuario.idusuario WHERE  rolusuario.idrol <> 1 ";
		$query=$this->db->query($query_str);
		return $query->result_array();	
	}


	public function getAll() {
		$query = $this->db->get('usuarios');
		return $query->result_array();		
	}
	public function getusuarios() {
		$query_str="SELECT * FROM usuarios ;";
		$query=$this->db->query($query_str);
		return $query->result_array();
	}
	public function getUsersNoAdmin() {
		$query_str="SELECT * FROM usuarios WHERE rol = 0 ;";
		$query=$this->db->query($query_str);
		return $query->result_array();
	}

	public function getNoAdminusuarios() {
		$query_str="SELECT * FROM usuarios where tipo <> 1;";
		$query=$this->db->query($query_str);
		return $query->result_array();
	}
	public function checkPassword($email,$password) {
		//$str=md5($password);
		$query_str="SELECT * FROM usuarios WHERE email='".$email."' and password='".$password."' ;";
		$query=$this->db->query($query_str);
		return $query->result_array();		
	}

	public function getCheckLogin($inputEmailSign,$inputUserNameSign,$inputPasswordSign,$tipo){
		$query_str="SELECT * FROM usuarios WHERE email='".$inputEmailSign."' ";
		$query=$this->db->query($query_str);
		return $query->result_array();	

	}

	public function insert($inputEmailSign,$inputUserNameSign,$inputPasswordSign,$key,$tipo){
		


			$this->load->helper('security');
			$this->db->trans_start(); # Starting Transaction
			$this->db->trans_strict(FALSE); 

			$data = array(
				'id' => null,
				'nombre' => $inputUserNameSign,
				'email' => $inputEmailSign,
				'password' => $inputPasswordSign,
				'rol' => intVal($tipo),
				'clau' => $key
			);

			$this->db->insert('usuarios', $data);
			
			$insert_id = $this->db->insert_id();

			$this->db->trans_complete(); # Completing transaction
			/*Optional*/
			if ($this->db->trans_status() === FALSE) {
				# Something went wrong.
				$this->db->trans_rollback();
				return FALSE;
			} else {
					# Everything is Perfect. 
					# Committing data to the database.
				$this->db->trans_commit();
					
			//	$key = md5(microtime().rand());
				$data2 = array(
					'id' => null,
					'user_id' => $insert_id,
					'key' => $key,
					'level' => 0,
					'ignore_limits' => 0,
					'is_private_key' => 0,
					'date_created'=>intVal(date("Ymd"))
				);

				$this->db->insert('keys', $data2);
					return TRUE;
			}


		return false;
	}

	
	public function ModificarApi($idUser,$newKey){
		if($newKey==""){
			$newKey = md5(microtime().rand());
		}
		$this->db->set('key', $newKey);
		$this->db->where('user_id', $idUser);
		$this->db->update('keys');
	}
	public function getKey($id){
		$query_str="SELECT keys.key FROM `keys` WHERE user_id=".$id." ";
		$query=$this->db->query($query_str);
		return $query->result_array();
	}
	public function Bloquear($idUsuario){
		$this->db->set('bloqueado', 1);
		$this->db->where('id', $idUsuario);
		$this->db->update('usuarios');
	}
	public function DesBloquear($idUsuario){
		$this->db->set('bloqueado', 0);
		$this->db->where('id', $idUsuario);
		$this->db->update('usuarios');
	}
	public function deleteUsuario($idUsuario) {	
		// var_dump($data);
		$this->load->helper('security');
		$this->db->trans_start(); # Starting Transaction
		$this->db->trans_strict(FALSE); 
		$this->db->where('id', $idUsuario);
		$this->db->delete('usuarios');
		$this->db->where('responsable', $idUsuario);
		$this->db->delete('restaurantes');
		$this->db->trans_complete(); # Completing transaction
		/*Optional*/
		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			return TRUE;
		}
	}
}