<?php
	require_once "Database.php";

	$serverHere;
	$dbHere;
	
	function initGetAllNews(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}

	function getAllNews($limit){
		GLOBAL $dbHere;
		$result = $dbHere->getAllNews($limit);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array( 'pesan'=>$res['pesan'], 'waktuPesan'=>$res['waktuPesan'] );
		}
		return json_encode($newResult);
	}
	
	function registerGetAllNews($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'getAllNewsWS',
			array(
				'limit' => 'xsd:int'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#egtAllNewsWS",
			'rpc',
			'encoded',
			'Mengambil semua pesan sesuai limit'
		);
	}
?>