<?php
$host = 'localhost';
$dbname = 'crudpdo';
$dbuser = 'root';
$dbpass = '';


$pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

