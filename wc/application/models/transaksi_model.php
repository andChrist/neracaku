<?php
	require_once "..http://localhost/Neracaku/ws/lib/nusoap.php";
	
	class transaksi_model extends CI_Model{
		
		public function insertTransaction_model($idPkl, $tipe, $total, $bayar){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("insertTransactionWS", array("idPkl"=>$idPkl, "tipe"=>$tipe, "total"=>$total, "bayar"=>$bayar));
			
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