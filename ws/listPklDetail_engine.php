<?php
	//Masih Belum Beres..............
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListPklDetail(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listPklDetail($idPkl, $idPemodal){
		GLOBAL $dbHere;
		$result = $dbHere->listPklDetails($idPkl, $idPemodal);
		
		$res = mysqli_fetch_assoc($result[0]);
		$newResult= array('nama'=>$res['nama'], 'deskripsi'=>$res['deskripsi'], 'alamat'=>$res['alamat'], 'kontak'=>$res['kontak'], 'saldo'=>$res['saldo']);
		
		return json_encode($newResult);
	}
	
	function registerListPklDetail($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'listPklDetailWS',
			array(
				'idPkl' => 'xsd:string',
				'idPemodal' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#listPklDetailWS",
			'rpc',
			'encoded',
			'Melakukan List Pkl Detail'
		);
	}
?>