<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initSignUp(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function signUp($tipe, $email, $pass, $nama, $ktp, $hp){
		GLOBAL $dbHere;
		$result = $dbHere->register($tipe, $email, $pass, $nama, $ktp, $hp);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerSignUp($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'signUpWS',
		array(
			'tipe' => 'xsd:string',
			'email' => 'xsd:string',
			'pass' => 'xsd:string',
			'nama' => 'xsd:string',
			'ktp' => 'xsd:string',
			'hp' => 'xsd:string'
		),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#loginWS",
		'rpc',
		'encoded',
		'Melakukan Register'
		);
	}
?>