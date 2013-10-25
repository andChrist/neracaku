<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initGetProfile(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function getProfile($idUser){
		GLOBAL $dbHere;

		$result = $dbHere->getProfile($idUser);
		
		$count = count($result);
		
		if($count==5){
			$resPKL = mysqli_fetch_assoc($result[0]);
			$newResult = array('nama'=>$resPKL['nama'], 'deskripsi'=>$resPKL['deskripsi'], 'alamat'=>$resPKL['alamat'], 'kontak'=>$resPKL['kontak'], 'saldo'=>$resPKL['saldo']);
		}else{
			if($count==3){
				$resPemodal = mysqli_fetch_assoc($result[1]);
				$newResult = array('nama'=>$resPemodal['nama'], 'deskripsi'=>$resPemodal['deskripsi'], 'saldo'=>$resPemodal['saldo']);
			}else{
				$resFasilitator = mysqli_fetch_assoc($result[2]);
				$newResult = array('alamat'=>$resFasilitator['alamat'], 'noHp'=>$resFasilitator['noHp']);
			}
		}
		
		return json_encode($newResult);
	}
	
	function registerGetProfile($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'getProfileWS',
			array(
				'idUser' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#getProfileWS",
			'rpc',
			'encoded',
			'Melakukan Get Profile'
		);
	}
?>