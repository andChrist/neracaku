<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initConfirmRegister(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function confirmRegister($idUser, $idFas){
		GLOBAL $dbHere;
		$result = $dbHere->confirmRegister($idUser, $idFas);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerConfirmRegister($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'confirmRegisterWS',
		array(
			'idUser' => 'xsd:string',
			'idFas' => 'xsd:string'
		),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#confirmRegisterWS",
		'rpc',
		'encoded',
		'Melakukan Konfirmasi Register'
		);
	}
?>