<?php
session_start();
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
        <?php
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
        ?>

        <form action="action/form.php" method="POST">
            <div class="inputBox">
                <input type="text" name="nome" class="input" placeholder="Seu nome" value="<?= isset($_POST['nome']) ? $_POST['nome'] : '' ?>">
            </div>
            <span class="error"><?= isset($_SESSION['nomeErro']) ? $_SESSION['nomeErro'] : ''; ?></span>

            <div class="inputBox">
                <input type="text" name="email" class="input" placeholder="exemplo@gmail.com" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            </div>
            <span class="error"><?= isset($_SESSION['emailErro']) ? $_SESSION['emailErro'] : ''; ?></span>

            <div class="inputBox">
                <input type="text" name="assunto" class="input" placeholder="Sua assunto" value="<?= isset($_POST['assunto']) ? $_POST['assunto'] : '' ?>">
            </div>
            <span class="error"><?= isset($_SESSION['assuntoErro']) ? $_SESSION['assuntoErro'] : ''; ?></span>

            <div class="inputBox">
               <textarea name="msg" id="msg" cols="10" rows="30" placeholder="Sua mensagem..."><?= isset($_POST['msg']) ? $_POST['msg'] : '' ?></textarea>
            </div>
            <span class="error"><?= isset($_SESSION['msgErro']) ? $_SESSION['msgErro'] : ''; ?></span>

            <button type="submit" name="enviar" class="btn">Enviar Mensagem</button>
        </form>
    </section>
</body>
</html>