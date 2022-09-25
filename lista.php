<?php
require("header.html");
require("config.php");

$consulta = $pdo->prepare("SELECT * FROM usuarios ORDER BY id DESC LIMIT 15");
$consulta->execute();
$rows = $consulta->rowCount();	

?>

<div class="">

	<h1>Lista de Funcionários</h1>
	<h4><?=$bd->rowCount()?>&nbsp;&nbsp;funcionários</h4>

	<table class="tabela" style="margin: 30px 0 30px;" border="1">
	
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Cargo</th>
			<th>Ação</th>
		</tr>
		
		<?php if($rows === 0): ?>
		
		<tr>
			<td><span>Não há nenhum registro no banco de dados</span></td>
		</tr>
		
		<?php else: 
		$lista = $consulta->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($lista as $item):
		?>
		
		<tr>
			<td><?=$item->nome?></td>
			<td><?=$item->email?></td>
			<td><?=$item->cargo?></td>
			<td><a href="editar.php?id=<?=$item->id?>" class="button buttonGreen">Editar</a>&nbsp;&nbsp;<a href="remover.php?id=<?=$item->id?>" class="button buttonDanger" onclick="return confirm('Tem certeza de que deseja deletar este item? Essa ação é irreversível')">Remover</a></td>
		</tr>
		
		<?php endforeach;
		endif;
		?>
		
	</table>

<?php
require("footer.html");
?>