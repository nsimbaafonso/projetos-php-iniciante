<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "wd43";

$conexao = new mysqli($host, $user, $pass, $db);

if ($conexao->connect_errno) {
	echo "Erro na conexão com a base de dados: ". $conexao->connect_error;
}