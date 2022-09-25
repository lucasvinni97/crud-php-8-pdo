<?php
require("header.html");
require("config.php");

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cargo'])) {
	
	$nome = filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
	$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
	$cargo = filter_input(INPUT_POST, "cargo", FILTER_DEFAULT);
	$salario = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	
	if ($nome != null || $email != null || $cargo != null || $salario != null ) {
		
		$consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = '$email'");
		$consulta->execute();
		$numRows = $consulta->rowCount();
		
		if ($numRows === 0) {
			
			$insert = $pdo->prepare("INSERT INTO usuarios (nome, email, cargo, salario) VALUES (:nome, :email, :cargo, :salario)");
			$insert->bindValue(':nome', $nome);
			$insert->bindValue(':email', $email);
			$insert->bindValue(':cargo', $cargo);
			$insert->bindValue(':salario', $salario);
			$insert->execute();
			$rows = $insert->rowCount();
			
			if($rows > 0) {
				
				header("Location: index.php");
				
			} else {
				
				echo "Ocorreu um erro!";
				
			}
			
		} else {
			
			echo "Email já existe!";
			
			
		}
		
	} else {
		
		header ("Location: cadastrar.php");
		
	}
	
}

?>