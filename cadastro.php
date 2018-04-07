<html>
	<body>
		<h2>Cadastre um novo cliente</h2>
		<form action = "registra_cadastro.php" method = "post">
			<label>
				Nome:
			<input type = "text" name = "nome" required = "required">
			</label><br />
			<label>
				Email:
			<input type = "email" name = "email" required = "required">
			</label><br />
			<label>
				Senha:
			<input type = "password" name = "senha" required = "required">
			</label><br />
			<label>
				CPF:
			<input type = "number" name = "cpf" required = "required">	
			</label><br />
			<input type = "submit" value = "Cadastrar">
		</form>
		<p><a href = "index.php">Voltar para o Login!</a></p>
	</body>
</html>