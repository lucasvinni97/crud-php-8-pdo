<?php
require("header.html");
require("config.php");

if (isset($_GET['id'])) {
	
	$g_id = $_GET['id'];
	$consulta = $pdo->prepare("SELECT * FROM usuarios WHERE id = '$g_id'");
	$consulta->execute();
	$nRows = $consulta->rowCount();
	
	if($nRows === 1) {
		$resultado = $consulta->fetch(PDO::FETCH_OBJ);
	}
	?>	
	
	<h1>Editar Funcionário</h1>
	<h4><?=$resultado->nome?></h4><br/><br/>
		
	<form method="post" action="">

		<label>Nome:</label></br>
		<input type="text" name="novo_nome" value="<?php echo $resultado->nome ?>" /><br/>
		
		<label>Email:</label></br>
		<input type="email" name="novo_email" value="<?php echo $resultado->email ?>" /><br/><br/>
		
		<label>Cargo:</label></br>
		<input type="text" name="novo_cargo" value="<?php echo $resultado->cargo ?>" /><br/>
		
		<label>Salário Bruto:</label><br/>
		<input type="number" name="novo_salario" value="<?php echo $resultado->salario ?>" step="0.01" /><br/>
		
		<input type="submit" value="Editar" />

	</form>
		
	<?php 
		if (isset($_POST['novo_nome']) && isset($_POST['novo_email'])) {
			
			$n_nome = $_POST['novo_nome'];
			$n_email = $_POST['novo_email'];
			$n_cargo = $_POST['novo_cargo'];
			$n_salario = $_POST['novo_salario'];
			
			$update = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, cargo = :cargo, salario = :salario WHERE id = :gId");
			$update->bindValue(':nome', $n_nome);
			$update->bindValue(':email', $n_email);
			$update->bindValue(':cargo', $n_cargo);
			$update->bindValue(':salario', $n_salario);
			$update->bindValue(':gId', $g_id);
			$update->execute();
			
			if ($update->rowCount() === 1) {
				
				header("Location: index.php");
				
			}
			
		}
		
	
	if($nRows === 0) {
		
		echo "Desculpe, esse usuário não existe!";
		
	}
	
}
?>