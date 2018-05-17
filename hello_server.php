<?php
		if(!extension_loaded("soap")){
		  dl("php_soap.dll");
		}

		function utf8ize($d) {
			if (is_array($d)) {
				foreach ($d as $k => $v) {
					$d[$k] = utf8ize($v);
				}
			} else if (is_string ($d)) {
				return utf8_encode($d);
			}
			return $d;
		}


		ini_set("soap.wsdl_cache_enabled","0");
		$server = new SoapServer("hello.wsdl");

		function doViajes($valor){
		
				$conn = new mysqli('localhost', 'root','','provam7uf4');
				if ($conn->connect_error) {
					die('Connect Error (' . $conn->connect_errno . ') '
							. $conn->connect_error);
				}
				$sql = "SELECT * FROM viajes Where identificador='".$valor."' ";
				$result = $conn->query($sql);
				$i=0;
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						 $data[$i] = $row;
						$i++;
					}
					$conn->close();

				} 
				$viajes = json_encode(utf8ize($data[0]));
			return $viajes ;
		}
		$server->AddFunction("doViajes");
		$server->handle();


	?>
