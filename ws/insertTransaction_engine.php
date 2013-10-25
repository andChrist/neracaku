<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initInsertTransaction(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function insertTransaction($idPkl, $tipe, $total, $bayar){
		GLOBAL $dbHere;
		$result = $dbHere->insertTransaction($idPkl, $tipe, $total, $bayar);
		return $result;
	}
	
	function registerInsertTransaction($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'insertTransaksiWS',
			array(
				'idPkl' => 'xsd:string',
				'tipe' => 'xsd:string',
				'total' => 'xsd:string',
				'bayar' => 'xsd:string'
			),
			array(
				'return' => 'xsd:int'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#insertTransactionWS",
			'rpc',
			'encoded',
			'Melakukan Insert Transaksi'
		);
	}
?>