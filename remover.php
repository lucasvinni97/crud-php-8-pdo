<?php
require("header.html");
require("config.php");

if($_GET['id']) {
	
	$g_id = $_GET['id'];

	$del = $pdo->prepare("DELETE FROM usuarios WHERE id = '$g_id'");
	$del->execute();

	if ($del->rowCount() === 1) {
		
		header("Location: index.php");
		
	}

}