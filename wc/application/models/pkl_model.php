<?php
	require_once "../ws/lib/nusoap.php";
	
	class pkl_model extends CI_Model{
	
		public function checkFunding_model($idPkl){
			$$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("checkFundingWS", array("idPkl"=>$idPkl));
			
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
		
		public function insertProfilePkl_model($idUser, $nama_pkl, $deskripsi_pkl, $alamat_pkl, $kontak_pkl){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("insertProfilePklWS", array("idUser"=>$idUser, "nama_pkl"=>$nama_pkl, "alamat_pkl"=>$alamat_pkl, "kontak_pkl"=>$kontak_pkl));
			
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