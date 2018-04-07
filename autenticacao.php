<?php
	session_start();
	$arquivo = "clientes.xml";
	
	if(file_exists($arquivo)){
		
		$xml = simplexml_load_file($arquivo);
		
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->email) == str_replace(" ","",$_POST["email"]) && str_replace(" ","",$cliente->senha) == str_replace(" ","",$_POST["senha"])){
				$_SESSION["login"] = (string)$cliente->nome;
				break;
			}
		}
	}
	
	header("location: index.php");
	
		

?>