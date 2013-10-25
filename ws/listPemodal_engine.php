<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListPemodal(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listPemodal(){
		GLOBAL $dbHere;
		$result = $dbHere->listPemodal();
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('nama'=>$res['nama'], 'deskripsi'=>$res['deskripsi'], 'saldo'=>$res['saldo']);
		}
		return json_encode($newResult);
	}
	
	function registerListPemodal($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'listPemodalWS',
			array(),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#listPemodalWS",
			'rpc',
			'encoded',
			'Melakukan List Pemodal'
		);
	}
?>