<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Item extends CI_Model {
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
    protected $_name = 'Item';

    public function BorrarItems(){
		$query_str="DELETE FROM Resultado";
        $query=$this->db->query($query_str);
        
        $query_str="DELETE FROM Item";
		$query=$this->db->query($query_str);
    }
    
	public function yaExiste($Item){
		$query_str="SELECT * FROM Item WHERE idItem=". $Item[0] ." ;"; 
		//echo $query_str; exit;
		$query=$this->db->query($query_str);
		return $query->result_array();
		
	}
    public function yaExisteRespuesta($Item){

		$query_str="SELECT * FROM Respuesta WHERE item=". $Item[0] ." ;"; 
		$query=$this->db->query($query_str);
		return $query->result_array();
		
	}
    public function CargarNuevosItems($csv)
    {
        $i=0;
		foreach($csv as $key => $Item)
		{      
            if(count($Item)>2){
                return 0;
            } 
            if($i<20){
                $res=$this->yaExiste($Item);
                if(count($res)==0){
                    $data = array(
                        'iditem' =>intval( $Item[0]),
                        'texto' => $Item[1],
                    );
                  //  echo $Item[0] . " " .$Item[1].  "<br>";
                    $this->db->insert('Item', $data);
                }

            }else{
                $res=$this->yaExisteRespuesta($Item);
                if(count($res)==0){
                    $data = array(
                        'item' => intval($Item[0]),
                        'texto' => $Item[1],
                    );
                  //  echo $Item[0] . " " .$Item[1]. " ". $Item[2]. "<br>";
                   $this->db->insert('Respuesta', $data);                
                }

            }

            $i=$i+1;
        } 
        return 1;
    }


    public function getAllItems() {
		$query_str="SELECT * FROM Item ";
		$query=$this->db->query($query_str);
		return $query->result_array();	
	}
}