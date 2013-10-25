<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListTransaction(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listTransaction($idPkl, $idPem){
		GLOBAL $dbHere;
		$result = $dbHere->listTransaction($idPkl, $idPem);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('waktuTransaksi'=>$res['waktuTransaksi'], 'tipe'=>$res['tipe'], 'total'=>$res['total'], 'bayar'=>$res['bayar'], 'kembalian'=>$res['kembalian']);
		}
		return json_encode($newResult);
	}
	
	function registerListTransaction($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'listTransactionWS',
			array(
				'idPkl' => 'xsd:string',
				'idPem' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#listTransactionWS",
			'rpc',
			'encoded',
			'Melakukan List Transaksi'
		);
	}
?>