<?php
//inicia sessão
session_start();
//conexao com a base de dados
require_once 'conexao.php';

if(isset($_FILES['arquivos'])):
    //formatos de arquivos aceitos
    $formatos = array("gif", "jpg", "jpeg", "png", "webp");
    //usamos a função count() para saber a quantidade de arquivos selecionados
    $qtdarquivos = count($_FILES['arquivos']['name']);
    //inicializamos o contador
    $contador = 0;

    while($contador < $qtdarquivos):
        //pegamos o nome do arquivo
        $nome = $_FILES['arquivos']['name'][$contador];
        /**a função pathinfo vai recuperar as extensões dos arquivos e
         * precisamos um índice já que estamos trabalhando com loop
         * adicionamos a variável de controle $contador
        */
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);

        /**verificamos se a extensão é permitida, caso seja fazemos o
         * upload e cadastramos na base de dados, caso não seja retorna
         * uma mensagem de aviso
        */
        if(in_array($extensao, $formatos)):
            //a pasta em que será feita o upload
            $pasta = "img/";
            //pegamos o arquivo na pasta temporário do servidor
            $temporario = $_FILES['arquivos']['tmp_name'][$contador];
            //geramos um novo nome único com a função uniqid()
            $novoNome = uniqid().".$extensao";
            //pegamos o caminho do arquivo
            $caminho = $pasta.$novoNome;

            if(move_uploaded_file($temporario, $caminho)):
                //depois do upload guardamos o arquivo no banco de dados
                $sql = "INSERT INTO arquivo (nome, caminho) VALUES ('$nome', '$caminho')";
                $resultado = mysqli_query($conexao, $sql);

                $_SESSION['msg'] = "<p class='bg-success text-dark p-2'>Upload feito com sucesso para o arquivo $nome</p>";
                header("Location: index.php");
            else:
                $_SESSION['msg'] = "<p class='bg-danger text-dark p-2'> Não foi possível fazer o Upload do arquivo $nome</p>";
                header("Location: index.php");
            endif;
        else:
            $_SESSION['msg'] = "<p class='bg-danger text-dark p-2'> O arquivo de formato $extensao não é permitido. São permitidos apenas arquivos gif, jpg, jpeg, png, webp.</p>";
            header("Location: index.php");
        endif;

        $contador++;
    endwhile;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload - Cadastrar</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

    <!--outros tipos: sm, md, lg, xl, xxl-->
    <div class="container-sm border py-3">
        <h1>Fazer novo upload(imagem)</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="my-3">
          <label class="form-label">Seleciona uma imagem</label>
          <input class="form-control" type="file" name="arquivos[]" multiple required>
        </div>

        <div class="container-fluid col bg-white my-3 p-3">
            <button type="submit" value="cadastrar" class="btn btn-primary">CADASTRAR</button>
            <a href="index.php" class="btn btn-secondary">LISTA DE UPLOADS(IMAGENS)</a>
        </div>
      </form>
    </div>

   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
</body>
</html>