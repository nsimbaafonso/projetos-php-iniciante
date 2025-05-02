<?php
session_start();
if (isset($_POST['enviar'])) {
    // Pegando e limpando os dados do input
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $assunto = htmlspecialchars($_POST['assunto']);
    $msg = htmlspecialchars($_POST['msg']);

    //validando os campos do formulário
    if (empty($nome)) {
         $_SESSION['nomeErro'] = "O campo nome está vazio deve ser preenchido";
    } else {
        $_SESSION['nomeErro'] = "";
    }

    /**
     * Para testar a validação devemos mudar o type para text
    */
    if (empty($email)) {
         $_SESSION['emailErro'] = "O campo email está vazio deve ser preenchido";
    } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
        $_SESSION['emailErro'] = "O email digitado é inválido";
    } else {
        $_SESSION['emailErro'] = "";
    }

    if (empty($assunto)) {
        $_SESSION['assuntoErro'] = "O campo assunto está vazio deve ser preenchido";
    } else {
        $_SESSION['assuntoErro'] = "";
    }

    if (empty($msg)) {
        $_SESSION['msgErro'] = "O campo mensagem está vazio deve ser preenchido";
    } else {
        $_SESSION['msgErro'] = "";
    }

    header("Location: ../index3.php");
}
