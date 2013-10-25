<?php
	Require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initCheckFunding(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function checkFunding($idPkl){
		GLOBAL $dbHere;
		$result = $dbHere->checkFunding($idPkl);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('nama'=>$res['nama'], 'deskripsi'=>$res['deskripsi'], 'saldo'=>$res['saldo']);
		}
		return json_encode($newResult);
	}
	
	function registerCheckFunding($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'checkFundingWS',
			array(
				'idPkl' => 'xsd:string'
			),
			array(
				'return' => 'tns:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#checkFundingWS",
			'rpc',
			'encoded',
			'Melakukan Pengecekan Pemodal'
		);
	}
?>