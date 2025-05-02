<?php
if (isset($_POST['enviar'])) {
    // Pegando e limpando os dados do input
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha' , FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_senha = filter_input(INPUT_POST, 'confirm_senha' , FILTER_SANITIZE_SPECIAL_CHARS);

    //validando os campos do formulário
    
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

    if (empty($senha)) {
         $senhaErro = "O campo senha está vazio deve ser preenchido";
    } else {
        $senhaErro = "";
    }
    
    if (empty($confirm_senha)) {
         $confirm_senhaErro = "Não se esqueça de confirmar sua senha";
    } elseif ($confirm_senha != $senha) {
        $confirm_senhaErro = "As senhas são diferentes, digite a senha correta";
    } else {
        $confirm_senhaErro = "";
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
        <h1>Validação de Formulário 2</h1>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">

            <div class="inputBox">
                <input type="email" name="email" class="input" placeholder="exemplo@gmail.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            </div>
            <span class="error"><?= isset($emailErro) ? $emailErro : ''; ?></span>

            <div class="inputBox">
                <input type="password" name="senha" placeholder="Sua senha" value="<?= isset($_POST['senha']) ? $_POST['senha'] : '' ?>">
            </div>
            <span class="error"><?= isset($senhaErro) ? $senhaErro : ''; ?></span>

            <div class="inputBox">
                <input type="password" name="confirm_senha" placeholder="Confirma sua senha" value="<?= isset($_POST['confirm_senha']) ? $_POST['confirm_senha'] : '' ?>">
            </div>
            <span class="error"><?= isset($confirm_senhaErro) ? $confirm_senhaErro : ''; ?></span>

            <button type="submit" name="enviar" class="btn">Entrar</button>
        </form>
    </section>
</body>
</html>