<?php
	require_once "Database.php";
	
	$serverHere;
	$dbHere;
	
	function initGetMail(&$server){
		GLOBAL $serverHere;
		GLOBAL $dbHere;
		$serverHere = $server;
		$dbHere = new Database();
	}
	
	function getMail($idPkl){
		GLOBAL $dbHere;
		$result = $dbHere->getMail($idPkl);
		$newResult = array();
		
		while($res = mysqli_fetch_assoc($result[0])){
			$newResult[] = array('idPesan'=>$res['idPesan'], 'nama'=>$res['nama'], 'subjek'=>$res['subjek'], 'pesan'=>$res['pesan'], 'waktuPesan'=>$res['waktuPesan']);
		}
		return json_encode($newResult);
	}
	
	function registerGetMail($myNamespace){
		GLOBAL $serverHere;
		
		$serverHere->register(
			'getMailWS',
			array(
				'idPkl'=>'xsd:string'
			),
			array(
				'return' => 'xsd:string'
			),
			'urn:' . $myNamespace,
			'urn:' . $myNamespace . "#getMailWS",
			'rpc',
			'encoded',
			'Melakukan Get Mail'
		);
	}
?>