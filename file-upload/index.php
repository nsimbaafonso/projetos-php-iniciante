<?php
//Iniciamos sessão
session_start();
//conexão com db
require_once 'conexao.php';

//pegando total de arquivos
$sql = "SELECT count(*) as total FROM arquivo";
$resultado = mysqli_query($conexao, $sql);
$dado = mysqli_fetch_array($resultado);
$total = $dado['total'];

//listando todos arquivos
$sql = "SELECT * FROM arquivo";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        img{
            max-width: 100px !important;
        }
    </style>
</head>
<body>

    <!--outros tipos: sm, md, lg, xl, xxl-->
    <div class="container-sm border py-3">
        <h1>Lista de uploads(imagens)</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
        }
        unset($_SESSION['msg']);
        ?>
        <p>Total: <span><?= $total; ?></span></p>
        <div class="table-responsive">
        <table class="table table-responsive table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Caminho</th>
                    <th>Baixar</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($resultado) > 0):
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                   <td><a href="ver.php?id=<?= $dados['id']; ?>"><img src="<?= $dados['caminho']; ?>" alt="<?= $dados['nome']; ?>" class="img-fluid"></a></td>
                   <td><?= $dados['nome']; ?></td>
                   <td><?= $dados['caminho']; ?></td>
                   <td><a href="<?= $dados['caminho']; ?>" download="<?= $dados['caminho']; ?>" class="btn btn-success">Baixar</a></td>
                   <td><?=  date("d/m/Y H:i:s", strtotime($dados['data_upload'])); ?></td>
                   <td><a href="update.php?id=<?= $dados['id']; ?>" class="btn btn-primary">Atualizar</a></td>
                   <td><a href="delete.php?id=<?= $dados['id']; ?>" class="btn btn-danger">Eliminar</a></td>
                </tr>
                <?php
                endwhile;
                ?>
                <?php
                mysqli_close($conexao);
                endif;
                ?>
            </tbody>
        </table>
        </div>
        <div class="container-fluid col bg-white my-3 p-3">
            <a href="cadastrar.php" class="btn btn-primary">CADASTRAR</a>
        </div>
    </div>

   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
</body>
</html>