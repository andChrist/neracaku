<?php
	require_once "lib/nusoap.php";
	$client = new nusoap_client("http://localhost/Neracaku/web_service.php");
	 
	$error = $client->getError();
	if ($error) {
		echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	}
	 
	//$result = $client->call("loginWS", array("email" => "sadf", "pass"=>"asdf"));
	$result = $client->call("signUpWS", array("tipe"=>"PKL", "email"=>"gtr", "pass"=>"gtr", "nama"=>"gtr", "ktp"=>"123", "hp"=>"007"));
	//$result = $client->call("confirmRegisterWS", array('idUser'=>'7', 'idFas'=>'5'));
	
	if ($client->fault) {
		echo "<h2>Fault</h2><pre>";
		print_r($result);
		echo "</pre>";
	}
	else {
		$error = $client->getError();
		if ($error) {
			echo "<h2>Error</h2><pre>" . $error . "</pre>";
		}
		else {
			echo "<h2>Books</h2><pre>";
			/*
			echo $result['id'] . '<br />';
			echo $result['tipe'] . '<br />';
			echo $result['username'] . '<br />';
			echo $result['mail'] . '<br />';
			echo $result['noKtp'] . '<br />';
			echo $result['hp'] . '<br />';
			echo $result['flag'] . '<br />';
			*/
			
			/*
			foreach($result as $key=>$f)
			{
				echo $key." : ".$f."<br/>";
			}*/
			
			print_r($result);
			
			echo "</pre>";
		}
	}
?>