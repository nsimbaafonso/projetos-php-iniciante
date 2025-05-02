<?php
if (isset($_POST['verificar'])) {
    $ano = htmlspecialchars($_POST['ano']);
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ano Bisexto</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Ano Bisexto</h1>

        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="inputBox">
                <input type="number" name="ano" class="input" placeholder="Digite o ano" min="1900" max="2100" value="<?= isset($_POST['ano']) ? $_POST['ano'] : '' ?>" required>
            </div>

            <button type="submit" name="verificar" class="btn">Verificar</button>
        </form>

        <?php if(isset($ano)): ?>
            <div id="res">
                <?php if($ano % 4 == 0): ?>
                    <p>O ano <?= $ano; ?> é bisexto</p>
                <?php else: ?>
                    <p>O ano <?= $ano; ?> não é bisexto</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>