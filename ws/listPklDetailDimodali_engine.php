<?php
	//Masih Belum Beres..............
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListPklDetailDimodali(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listPklDetailDimodali($idPkl, $idPemodal){
		GLOBAL $dbHere;
		$result = $dbHere->listPklDetails($idPkl, $idPemodal);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[1])){
			$newResult[] = array('waktuTransaksi'=>$res['waktuTransaksi'], 'tipe'=>$res['tipe'], 'total'=>$res['total'], 'bayar'=>$res['bayar'], 'kembalian'=>$res['kembalian']);
		}
		return json_encode($newResult);
	}
	
	function registerListPklDetailDimodali($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'listPklDetailDimodaliWS',
			array(
				'idPkl' => 'xsd:string',
				'idPemodal' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#listPklDetailDimodaliWS",
			'rpc',
			'encoded',
			'Melakukan List Pkl Detail'
		);
	}
?>