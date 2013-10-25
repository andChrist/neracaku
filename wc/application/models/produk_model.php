<?php
	require_once "../ws/lib/nusoap.php";
	
	class produk_model extends CI_Model{
		
		public function getProduct_model($idPkl, $idProduk){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("getProductWS", array("idPkl"=>$idPkl, "idProduk"=>$idProduk));
			
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
		
		public function insertProduct_model($idPkl, $namaProduk, $deskripsi, $biaya, $harga, $link){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("insertProductWS", array("idPkl"=>$idPkl, "namaProduk"=>$namaProduk, "deskripsi"=>$deskripsi, "biaya"=>$biaya, "harga"=>$harga, "link"=>$link));
			
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
		
		public function promote_model($idPkl, $idProduk){
			$client = new nusoap_client('http://localhost/Neracaku/ws/web_service.php');
			$error = $client->getError();

			if($error){
				echo "<h2>Constructor error</h2><pre>";
			}
			
			$result = $client->call("promoteWS", array("idPkl"=>$idPkl, "idProduk"=>$idProduk));
			
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