<html>
	<head>
		<title>Index</title>
		<meta charset = "UTF-8" />
	</head>
</html>
<?php
	session_start();
	
	$arquivo = "clientes.xml";

	$xml = simplexml_load_file($arquivo);

	if(isset($_POST["saque"])){
			foreach($xml->cliente as $cliente){
				if(str_replace(" ","",$cliente->nome)==str_replace(" ","",$_SESSION["login"])){
					$valor_retirado = $_POST["saque"];
					$saldo = $cliente->saldo;
					$total = $saldo-$valor_retirado;
					if($total<0){
						die("Não foi possível realizar a Operação. Saldo menor que 0.";
						'<a href = "mostra_cliente.php">Voltar</a>');
					}else{
						(float)$cliente->saldo -= (float)$_POST["saque"];
						$xml->asXML($arquivo);
					}
				}
			}
	
				
	}
	else if(isset($_POST["deposito"])){
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_SESSION["login"])){
				(float)$cliente->saldo += (float)$_POST["deposito"];
				break;
			}
		}
		$xml->asXML($arquivo);
	}
	else if(isset($_POST["transferencia"])){
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_POST["recebedor"])){
				(float)$cliente->saldo += (float)$_POST["transferencia"];
			}
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_SESSION["login"])){
				(float)$cliente->saldo -= (float)$_POST["transferencia"];
			}
			
		}
		$xml->asXML($arquivo);
	}
	else{
		header("location: index.php");
	}
	
	header("location: mostra_cliente.php");
?>