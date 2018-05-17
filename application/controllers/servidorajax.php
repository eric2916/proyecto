<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class servidorajax extends CI_Controller {
	public function index()
	{

        $host="92.222.27.83"; 
        $username="w2-dlagunas";  
        $password="46781187S";
        $db_name="w2_dlagunas"; 
        error_reporting(E_ALL ^ E_DEPRECATED);
        $con=mysql_connect("$host", "$username", "$password");
        mysql_select_db("$db_name");

        /*
        include('../includes/dbopen.php');
        Aquest codi inclou el fitxer dbopen.php, que obre una connexió a la base de dades MySQL.
        */
         $nombre = $_POST['nombre'];
         $apellido1 = $_POST['apellido1'];
         $apellido2 = $_POST['apellido2'];
         $curso = $_POST['curso'];
        /*
        D'aquesta manera, recopilem les dades (enviades per l'usuari) per Ajax a PHP.
        */    
            $sql = "select id , nombre , apellido1, apellido2  from Usuario  left join rolusuario on rolusuario.idusuario=Usuario.id where rolusuario.idrol = 3 ";
            $result = mysql_query($sql);
            $users=array();
            while($row=mysql_fetch_array($result))
            {
                $usu=array("id"=>$row['id'],"nombre"=>$row['nombre'],"apellido1"=>$row['apellido1'],"apellido2"=>$row['apellido2']);
                array_push($users, $usu);
                //echo "".$row['id']."~".$row['nombre']."~".$row['apellido1']."~".$row['apellido2']."~".$row['Informes'];
            }
            echo json_encode($users);
        /*
        D'aquesta manera recollim les dades (S'executa una consulta MySQL per seleccionar tots els llibres que comencen amb la lletra subministrada per l'usuari i es preparen les dades subministrades). 
        */    
	}

}