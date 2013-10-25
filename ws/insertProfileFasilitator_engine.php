<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initInsertProfileFasilitator(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function insertProfileFasilitator($ID_user, $alamat, $no_hp){
		GLOBAL $dbHere;
		$result = $dbHere->insertProfile($ID_user, $alamat, $no_hp);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerInsertProfileFasilitator($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'insertProfileFasilitatorWS',
		array(),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#insertProfileFasilitatorWS",
		'rpc',
		'encoded',
		'Melakukan Insert Profile Untuk Fasilitator'
		);
	}
?>