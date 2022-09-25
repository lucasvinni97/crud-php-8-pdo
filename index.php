<?php
require("header.html");
require("config.php");

$bd = $pdo->prepare("SELECT * FROM usuarios");
$bd->execute();


$resultados = $bd->fetchAll(PDO::FETCH_OBJ);
?>

<div class="">

	<h1>Lista de Funcionários</h1>
	<h4><?=$bd->rowCount()?>&nbsp;&nbsp;funcionários</h4>

	<table class="tabela" style="margin: 30px 0 30px;" border="1">
	
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Cargo</th>
			<th>Salário</th>
			<th>Ação</th>
		</tr>
		
		<?php foreach($resultados as $row):?>
		
		<tr>
		
			<td><?=$row->nome?></td>
			<td><?=$row->email?></td>
			<td><?=$row->cargo?></td>
			<td>R$&nbsp;<?=$row->salario?></td>
			<td><a href="editar.php?id=<?=$row->id?>" class="button buttonGreen">Editar</a>&nbsp;&nbsp;<a href="remover.php?id=<?=$row->id?>" class="button buttonDanger" onclick="return confirm('Tem certeza de que deseja deletar este item? Essa ação é irreversível')">Remover</a></td>
			
		</tr>
		
		<?php endforeach ?>
		
		<tr>
		
			<td>
				<?php echo "Registros:&nbsp;"  . $bd->rowCount(); ?>
			</td>
		
		</tr>
	
	</table>
	
	<div id="novo">
	
		<a href="cadastrar.php" class="button">Cadastrar Funcionário</a>
		<a href="lista.php" class="button">Ver Lista Completa</a>
	
	</div>

</div>

<?php 
require("footer.html");
?>