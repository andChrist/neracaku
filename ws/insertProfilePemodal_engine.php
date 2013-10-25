<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initInsertProfilePemodal(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function insertProfilePemodal($ID_user, $nama_pemodal, $deskripsi_pemodal, $saldo_dana){
		GLOBAL $dbHere;
		$result = $dbHere->insertProfile($ID_user, $nama_pemodal, $deskripsi_pemodal, $saldo_dana);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerInsertProfilePemodal($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'insertProfilePemodalWS',
		array(),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#insertProfilePemodalWS",
		'rpc',
		'encoded',
		'Melakukan Insert Profile Pemodal'
		);
	}
?>