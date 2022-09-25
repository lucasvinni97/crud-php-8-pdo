<?php
require("header.html");
require("config.php");
?>

<div class="main">

	<h1>Cadastrar Funcionário</h1>
	<h4>Insira as informações básicas do funcionário abaixo:</h4><br/><br/>

	<form method="post" action="dados_cadastro.php">
	
		<label>Nome:</label><br/>
		<input type="text" name="nome" /><br/>
		
		<label>Email:</label><br/>
		<input type="email" name="email" /><br/>
		
		<label>Cargo:</label><br/>
		<input type="text" name="cargo" /><br/>
		
		<label>Salário Bruto:</label><br/>
		<input type="number" name="salario" step="0.01" /><br/>
		
		<input type="submit" value="Cadastrar" />
	
	</form>

</div>