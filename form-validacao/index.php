<?php
if (isset($_POST['enviar'])) {
    // Pegando e limpando os dados do input
    $nome = filter_input(INPUT_POST, 'nome' , FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL);
    $assunto = filter_input(INPUT_POST, 'assunto' , FILTER_SANITIZE_SPECIAL_CHARS);
    $msg = filter_input(INPUT_POST, 'msg' , FILTER_SANITIZE_SPECIAL_CHARS);

    //validando os campos do formulário
    if (empty($nome)) {
         $nomeErro = "O campo nome está vazio deve ser preenchido";
    } else {
        $nomeErro = "";
    }

    /**
     * Para testar a validação devemos mudar o type para text
    */
    if (empty($email)) {
         $emailErro = "O campo email está vazio deve ser preenchido";
    } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
        $emailErro = "O email digitado é inválido";
    } else {
        $emailErro = "";
    }

    if (empty($assunto)) {
         $assuntoErro = "O campo assunto está vazio deve ser preenchido";
    } else {
        $assuntoErro = "";
    }

    if (empty($msg)) {
         $msgErro = "O campo mensagem está vazio deve ser preenchido";
    } else {
        $msgErro = "";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Formulário</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Validação de Formulário</h1>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <div class="inputBox">
                <input type="text" name="nome" class="input" placeholder="Seu nome" value="<?= isset($_POST['nome']) ? $_POST['nome'] : '' ?>">
            </div>
            <span class="error"><?= isset($nomeErro) ? $nomeErro : ''; ?></span>

            <div class="inputBox">
                <input type="email" name="email" class="input" placeholder="exemplo@gmail.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            </div>
            <span class="error"><?= isset($emailErro) ? $emailErro : ''; ?></span>

            <div class="inputBox">
                <input type="text" name="assunto" class="input" placeholder="Sua assunto" value="<?= isset($_POST['assunto']) ? $_POST['assunto'] : '' ?>">
            </div>
            <span class="error"><?= isset($assuntoErro) ? $assuntoErro : ''; ?></span>

            <div class="inputBox">
               <textarea name="msg" id="msg" cols="10" rows="30" placeholder="Sua mensagem..."><?= isset($_POST['msg']) ? $_POST['msg'] : '' ?></textarea>
            </div>
            <span class="error"><?= isset($msgErro) ? $msgErro : ''; ?></span>

            <button type="submit" name="enviar" class="btn">Enviar Mensagem</button>
        </form>
    </section>
</body>
</html>