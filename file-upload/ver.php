<?php
//conexao com a base de dados
require_once 'conexao.php';

if(isset($_GET['id'])):
    $id = htmlspecialchars(mysqli_escape_string($conexao, $_GET['id']));

    $sql = "SELECT * FROM arquivo WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
else:
    header("Location: index.php");
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload - Ver</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        figure {
            max-width: 100%;
            box-sizing: border-box;
            margin: 3rem;
            padding: 1.5rem;
            text-align: center;
            background-color: whitesmoke;
            border: .1rem solid lightgrey;
        }

        figcaption {
            margin-top: 1rem;
            font-size: 2rem;
            font-weight: bolder;
        }
        figure img {
            width: 100%;
            max-width: 350px !important;
        }
        .image {
            width: 550px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

    <!--outros tipos: sm, md, lg, xl, xxl-->
    <div class="container-sm border py-3">
        <h1>Ver imagem</h1>
        <figure class="image">
            <img src="<?=$dados['caminho']?>" alt="<?=$dados['nome']?>" class=" img-fluid">
            <figcaption><?=$dados['nome']?></figcaption>
        </figure>
      </form>
    </div>

   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
</body>
</html>