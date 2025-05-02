<?php
//iniciar sessão
session_start();
//conexão
require_once 'conexao.php';

//deletando arquivos
if(isset($_GET['id'])):
    //pegando o caminho para deletar o arquivo
    $id = htmlspecialchars(mysqli_escape_string($conexao, $_GET['id']));
    $sql = "SELECT * FROM arquivo WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);

    //função para deletar arquivo
    if(unlink($dados['caminho'])):
        $sql = "DELETE FROM arquivo WHERE id = '$id'";
        $resultado = mysqli_query($conexao, $sql);
        if ($resultado):
            $_SESSION['msg'] = "<p class='bg-success text-dark p-2'>Arquivo excluído com sucesso</p>";
            header("Location: index.php");
        else:
            $_SESSION['msg'] = "<p class='bg-danger text-dark p-2'>Erro ao excluír arquivo</p>";
            header("Location: index.php");
        endif;
    endif;

endif;