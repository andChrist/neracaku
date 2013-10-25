<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListPenggunaNonApprove(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listPenggunaNonApprove(){
		GLOBAL $dbHere;
		$result = $dbHere->listPenggunaNonApproved();
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('waktuDaftar'=>$res['waktuDaftar'], 'tipeUser'=>$res['tipeUser'], 'nama'=>$res['nama'], 'email'=>$res['email'], 'ktp'=>$res['ktp'], 'noHp'=>$res['noHp']);
		}
		return json_encode($newResult);
	}
	
	function registerListPenggunaNonApprove($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'listPenggunaNonApproveWS',
		array(),
		array(
			'return' => 'xsd:string'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#listPenggunaNonApproveWS",
		'rpc',
		'encoded',
		'Melakukan list pemodalan non approve'
		);
	}
?>