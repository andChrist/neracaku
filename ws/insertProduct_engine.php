<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initInsertProduct(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function insertProduct($idPkl, $namaProduk, $deskripsi, $biaya, $harga, $link){
		GLOBAL $dbHere;
		$result = $dbHere->insertProduk($idPkl, $namaProduk, $deskripsi, $biaya, $harga, $link);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerInsertProduct($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'insertProductWS',
			array(
				'idPkl' => 'xsd:string',
				'namaProduk' => 'xsd:string',
				'deskripsi' => 'xsd:string',
				'biaya' => 'xsd:string',
				'harga' => 'xsd:string',
				'link' => 'xsd:string'
			),
			array(
				'return' => 'xsd:int'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#insertProductWS",
			'rpc',
			'encoded',
			'Melakukan Promosi'
		);
	}
?>