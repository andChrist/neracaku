<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initGetDetilTransaction(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function getDetilTransaction($notransaksi, $idPkl){
		GLOBAL $dbHere;
		$result = $dbHere->getDetilTransaction($notransaksi, $idPkl);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('waktuTransaksi'=>$res['waktuTransaksi'], 'tipe'=>$res['tipe'], 'total'=>$res['total'], 'bayar'=>$res['bayar'], 'kembalian'=>$res['kembalian']);
		}
		return json_encode($newResult);
	}
	
	function registerGetDetilTransaction($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'getDetilTransactionWS',
			array(
				'notransaksi' => 'xsd:string',
				'idPkl' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#getDetilTransactionWS",
			'rpc',
			'encoded',
			'Melakukan get detil Transaksi'
		);
	}
?>