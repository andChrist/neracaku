<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initAddBalance(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function addBalance($idPkl, $saldo, $idPemodal, $tipe){
		GLOBAL $dbHere;
		$result = $dbHere->addBalance($idPkl, $saldo, $idPemodal, $tipe);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerAddBalance($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'addBalanceWS',
		array(
			'idPkl' => 'xsd:string',
			'saldo' => 'xsd:string',
			'idPemodal' => 'xsd:string',
			'tipe' => 'xsd:string'
		),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#addBalanceWS",
		'rpc',
		'encoded',
		'Melakukan Penambahan Saldo'
		);
	}
?>