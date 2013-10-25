<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initInsertProfilePkl(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function insertProfilePkl($ID_user, $nama_pkl, $deskripsi_pkl, $alamat_pkl, $kontak_pkl){
		GLOBAL $dbHere;
		$result = $dbHere->insertProfile($ID_user, $nama_pkl, $deskripsi_pkl, $alamat_pkl, $kontak_pkl);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerInsertProfilePkl($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'insertProfilePklWS',
		array(),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#insertProfilePklWS",
		'rpc',
		'encoded',
		'Melakukan Insert Profile PKL'
		);
	}
?>