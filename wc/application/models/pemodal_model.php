<?php
	require_once "../ws/lib/nusoap.php";
	
	class pemodal_model extends CI_Model{
		
		public function insertProfilePemodal_model($idUser, $nama_pemodal, $deskripsi_pemodal, $saldo_dana){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("insertProfilePemodalWS", array("idUser"=>$idUser, "nama_pemodal"=>$nama_pemodal, "deskripsi_pemodal"=>$deskripsi_pemodal, "saldo_dana"=>$saldo_dana));
			
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