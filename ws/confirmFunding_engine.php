<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initConfirmFunding(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function confirmFunding($idModal, $idFas){
		GLOBAL $dbHere;
		$result = $dbHere->confirmFunding($idModal, $idFas);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerConfirmFunding($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'confirmFundingWS',
		array(
			'idModal' => 'xsd:string',
			'idFas' => 'xsd:string'
		),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#confirmFundingWS",
		'rpc',
		'encoded',
		'Melakukan Konfirmasi Funding'
		);
	}
?>