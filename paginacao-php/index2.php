<?php
require_once 'conexao.php';

//total de registros
$sql_count = "SELECT COUNT(*) as total FROM produtos";
$sql_tot = $conexao->query($sql_count);
$dado = $sql_tot->fetch_assoc();
$total = $dado["total"];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;//
$limit = 3;//limit mostra uma quantidade específico de registros por páginas
$offset = ($page - 1) * $limit;//offset mostra onde vai começar a próxima linha

//números de páginas
$page_num = ceil($total / $limit);

$sql_produtos = "SELECT * FROM produtos ORDER BY nome ASC limit {$limit} offset {$offset}";
$sql_exec = $conexao->query($sql_produtos) or die($conexao->error);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paginação</title>
	<style type="text/css">
		table {
			border: .1rem solid #000;
    		border-collapse: collapse;
    		border-spacing: 0;
		}
	</style>
</head>
<body>
	<h1>Produtos (<?= $total; ?>)</h1>
	<table>
		<tr>
			<th>Nome</th>
			<th>Preço</th>
		</tr>
		<?php while ($produto = $sql_exec->fetch_assoc()):?>
		<tr>
			<td><?=$produto["nome"]?></td>
			<td><?=$produto["preco"]?></td>
		</tr>
		<?php endwhile;?>
	</table>

	<p>
		<?= "Página: {$page}"?> -
		<?= "Número de Páginas: {$page_num}"?>
	</p>
	<p>
		<?php
		for ($p=1; $p <= $page_num ; $p++) {
			if ($p === $page) {
				echo "[{$p}]";
			} else {
				echo "<a href='?page={$p}'>[{$p}]</a>";
			}
		}
		?>
	</p>
</body>
</html>