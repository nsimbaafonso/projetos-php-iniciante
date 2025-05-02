<?php
if (isset($_POST['tentar'])) {
    $num = htmlspecialchars($_POST['num']);
    $rand = rand($num, 100);
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo Adivinha</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Jogo Adivinha</h1>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <div class="inputBox">
                <input type="number" name="num" placeholder="Digite um número para acertar" value="<?= isset($_POST['num']) ? $_POST['num'] : '' ;?>" min="0" max="100" required>
            </div>

            <button type="submit" name="tentar" class="btn">Tentar</button>
        </form>

        <?php if(isset($num)): ?>
            <div id="res">
                <?php if($num == $rand): ?>
                    <p class="msg certo">Parabéns!🏆🥉🎉. O número digitado [<?= $num;?>] é igual do número gerado [<?= $rand;?>]✔</p>
                <?php else: ?>
                    <p class="msg erro">Que pena!😢🥈. O número digitado [<?= $num;?>] é diferente do número gerado [<?= $rand;?>] ❌</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div id="res">
                <p>Nada para tentar</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>