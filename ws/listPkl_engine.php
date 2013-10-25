<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListPkl(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listPkl($status){
		GLOBAL $dbHere;
		$result = $dbHere->listPKL($status);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('nama'=>$res['nama'], 'deskripsi'=>$res['deskripsi'], 'alamat'=>$res['alamat'], 'kontak'=>$res['kontak']);
		}
		return json_encode($newResult);
	}
	
	function registerListPkl($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'listPklWS',
			array(
				'status' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#listPklWS",
			'rpc',
			'encoded',
			'Melakukan List Pkl'
		);
	}
?>