<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "upload";

$conexao = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conexao, "UTF8");

if (mysqli_connect_error()) {
	echo "Erro: ".mysqli_connect_error();
}