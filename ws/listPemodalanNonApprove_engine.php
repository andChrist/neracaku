<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initListPemodalanNonApprove(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function listPemodalanNonApprove(){
		GLOBAL $dbHere;
		$result = $dbHere->listPemodalanNonApprove();
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('idModal'=>$res['idModal'], 'namaPemodal'=>$res['namaPemodal'], 'namaPkl'=>$res['namaPkl'], 'besarModal'=>$res['besarModal']);
		}
		return json_encode($newResult);
	}
	
	function registerListPemodalanNonApprove($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'listPemodalanNonApproveWS',
		array(),
		array(
			'return' => 'xsd:string'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#listPemodalanNonApproveWS",
		'rpc',
		'encoded',
		'Melakukan list pemodalan non approve'
		);
	}
?>