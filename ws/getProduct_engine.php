<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initGetProduct(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function getProduct($idPkl, $idProduk){
		GLOBAL $dbHere;
		
		$result = $dbHere->getProduk($idPkl, $idProduk);
		$newResult = array();
		
		if($idProduk==-1){
			while($res = mysqli_fetch_assoc($result[0])){
				$newResult[] = array('namaProduk'=>$res['namaProduk'], 'deskripsi'=>$res['deskripsi'], 'link'=>$res['link']);
			}
		}else{
			while($res = mysqli_fetch_assoc($result[0])){
				$newResult[] = array('namaProduk'=>$res['namaProduk'], 'deskripsi'=>$res['deskripsi'], 'link'=>$res['link'], 'biayaModal'=>$res['biayaModal'], 'hargaJual'=>$res['hargaJual']);
			}
		}
		return json_encode($newResult);
	}
	
	function registerGetProduct($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'getProductWS',
			array(
				'idPkl' => 'xsd:string',
				'idProduk' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#getProductWS",
			'rpc',
			'encoded',
			'Melakukan Get Produk'
		);
		
	}
?>