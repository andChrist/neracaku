<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initSendMail(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function sendMail($pesan, $idPengirim, $idTujuan){
		GLOBAL $dbHere;
		$result = $dbHere->sendMail($pesan, $idPengirim, $idTujuan);
		if($result==1){
			return $result;
		}else{
			return 0;
		}
	}
	
	function registerSendMail($myNamespace){
		GLOBAL $serverHere;
		$serverHere->register(
		'sendMailWS',
		array(
			'pesan' => 'xsd:string',
			'idPengirim' => 'xsd:string',
			'idTujuan' => 'xsd:string'
		),
		array(
			'return' => 'xsd:int'
		),
		'urn:' . $myNamespace,
		'urn:' . $myNamespace . "#sendMailWS",
		'rpc',
		'encoded',
		'Melakukan Pengiriman Pesan'
		);
	}
?>