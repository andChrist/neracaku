<?php
        require_once "../ws/lib/nusoap.php";
	class pengguna_model extends CI_Model{
		
		public function signup_model($tipe, $email, $pass, $nama, $ktp, $hp){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			$result = $client->call("signUpWS", array("tipe"=>$tipe, "email"=>$email, "pass"=>$pass, "nama"=>$nama, "ktp"=>$ktp, "hp"=>$hp));
			
			if($client->fault){
				echo "<h2>Fault</h2><pre>";
				print_r($result);
				echo "</pre>";
			}
			else{
				$error = $client->getError();
				if($error){
					echo "<h2>Error</h2><pre>" . $error . "</pre>";
				}
				else{
					return $result;
				}
			}
		}
	
		
		public function login_model($email, $pass){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("loginWS", array("email"=>$email, "pass"=>$pass));
			
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
		
		public function getProfile_model($idUser){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("getProfileWS", array("idUser"=>$idUser));
			
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