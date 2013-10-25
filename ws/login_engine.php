<?php
	require_once "Database.php";

	$serverHere;
	$dbHere;
	
	function initLogin(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}

	function login($email, $pass){
		GLOBAL $dbHere;
		$result = $dbHere->login($email, $pass);
		
		$res = mysqli_fetch_assoc($result[0]);
		$resSatu = mysqli_fetch_assoc($result[1]);
		$newResult = array( 'id'=>$res['id'], 'tipe'=>$res['tipe'], 'username'=>$res['username'], 'mail'=>$res['mail'], 'noKtp'=>$res['noKtp'], 'hp'=>$res['hp'], 'flag'=>$resSatu['flag'] );
	
		return json_encode($newResult);
	}
	
	function registerLogin($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'loginWS',
			array(
				'email' => 'xsd:string',
				'pass' => 'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#loginWS",
			'rpc',
			'encoded',
			'Melakukan Login'
		);
	}
?>