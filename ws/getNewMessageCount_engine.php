<?php
	require_once "Database.php";

	$serverHere;
	$dbHere;
	
	function initGetNewMessageCount(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}

	function getNewMessageCount($idUser){
		GLOBAL $dbHere;
		$result = $dbHere->getNewMessageCount($idUser);
		
		$res = mysqli_fetch_assoc($result[0]);
	
		return $res['count'];
	}
	
	function registerGetNewMessageCount($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'getNewMessageCountWS',
			array(
				'idUser' => 'xsd:string'
			),
			array(
				'return' => 'xsd:int'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#getNewMessageCountWS",
			'rpc',
			'encoded',
			'Mendapatkan jumlah pesan baru'
		);
	}
?>