<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Informe extends CI_Model {
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
    protected $_name = 'Informe';

    public function  updateTexto($eval,$alumno,$tutor,$curso,$informeprovisional){
        $data = array(
            'texto' => $informeprovisional,
         );

        $this->db->where('tutor',$tutor);
        $this->db->where('usuario', $alumno);
        $this->db->where('curso', $curso);
        $this->db->where('trimestre', $eval);
        $this->db->update('Informe', $data); 
    }

    public function  updateTextoRevisado($idInforme,$texto){
        $data = array(
            'texto' => $texto,
         );

        $this->db->where('idInforme',$idInforme);
        $this->db->update('Informe', $data);
    }
    public function GuardarInforme($resultados,$totalitems,$eval,$alumno,$tutor,$curso){
    
        $this->db->trans_begin();

            $data = array(
                'idInforme' => null,
                'tutor' => $tutor,
                'usuario' => $alumno,
                'trimestre' => $eval,
                'curso' => $curso,
            );
    
            $this->db->insert('Informe', $data); 
            $idinforme=$this->db->insert_id();

            foreach ($resultados as $iditem => $valor) {
                $insertval = array(
                    'idResultado' => null,
                    'item' => intval($iditem),
                    'informe' => $idinforme,
                    'valor' => intval($valor),

                );
                $this->db->insert('Resultado', $insertval); 
            }

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return FALSE;
        }
        else
        {
                $this->db->trans_commit();
                return TRUE;
        }
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
        $insertadas=0;
        $i=0;
		foreach($csv as $key => $Item)
		{      
            if(count($Item)>3){
                return 0;
            } 
            if($i<20){
                $res=$this->yaExiste($Item);
                if(count($res)==0){
                    $data = array(
                        'iditem' =>intval( $Item[0]),
                        'texto' => $Item[1],
                        'categoria' => $Item[2]
                    );
                  //  echo $Item[0] . " " .$Item[1].  "<br>";
                    $this->db->insert('Item', $data);
                    $insertadas=$insertadas+1;
                }

            }else{
                $res=$this->yaExisteRespuesta($Item);
                if(count($res)==0){
                    $data = array(
                        'item' => intval($Item[0]),
                        'texto' => $Item[1],
                        'categoria' => $Item[2]
                    );
                  //  echo $Item[0] . " " .$Item[1]. " ". $Item[2]. "<br>";
                   $this->db->insert('Respuesta', $data);                
                }

            }

            $i=$i+1;
        } 
        return $insertadas;
    }


    public function getAllItems() {
		$query_str="SELECT Item.*,categoria.descripcion FROM Item left join categoria on Item.categoria=categoria.idcategoria ";
		$query=$this->db->query($query_str);
		return $query->result_array();	
    }

    public function getInforme($eval,$curso,$alumno,$usuario){
		$query_str="SELECT * FROM Informe WHERE tutor=$usuario AND trimestre=$eval AND curso='$curso' AND usuario=$alumno ";
		$query=$this->db->query($query_str);
		return $query->result_array();
    }

}