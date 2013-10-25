<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initPromote(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function promote($idPkl, $idProduk){
		GLOBAL $dbHere;
		$result = $dbHere->promote($idPkl, $idProduk);
		
		$res = mysqli_fetch_assoc($result[0]);
		$newResult = $res['t'];
		if($newResult>=1000000){
			return 1;
		}else{
			return 0;
		}
	}
	
	function registerPromote($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'promoteWS',
			array(
				'idPkl' => 'xsd:string',
				'idProduk' => 'xsd:string'
			),
			array(
				'return' => 'xsd:int'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#promoteWS",
			'rpc',
			'encoded',
			'Melakukan Promosi'
		);
	}
?>