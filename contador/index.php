<?php
if (isset($_POST['contar'])) {
    $n = htmlspecialchars($_POST['numero']);
    $c = 0;
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Contador</h1>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <div class="inputBox">
                <input type="number" name="numero" placeholder="Digite um número" value="<?= isset($_POST['numero']) ? $_POST['numero'] : '' ?>" required>
            </div>

            <button type="submit" name="contar" class="btn">Contar</button>
        </form>

        <?php if(isset($n)): ?>
            <div id="res">
                <?php while ($c <= $n) { ?>
                    <?= $c; ?>
                    <?php $c++; ?>
                <?php } ?>
            </div>
        <?php else: ?>
            <div id="res" class="hide">
                <p>Nada para contar...</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>