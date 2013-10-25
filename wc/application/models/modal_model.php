<?php
	require_once "../ws/lib/nusoap.php";
	
	class modal_model extends CI_Model{
		
		public function addBalance_model($idPkl, $saldo, $idPemodal, $tipe){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			$result = $client->call("addBalanceWS", array("idPkl"=>$idPkl, "saldo"=>$saldo, "idPemodal"=>$idPemodal, "tipe"=>$tipe));
			
			if($client->fault){
				echo "<h2>Fault</h2><pre>";
				print_r($result);
				echo "</pre>";
			}
			else{
				$error = $client->getError();
				if($error){
					echo "<h2>Error</h2><pre>" . $error . "</pre>";
					echo "error2";
				}
				else{
					return $result;
				}
			}
		}
		
	}
?>