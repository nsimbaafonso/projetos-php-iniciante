<?php
if (isset($_POST['calcular'])) {
    $num = htmlspecialchars($_POST['num']);
    $c = 1;
    $erro = "";

    if (empty($num)) {
        $erro = "<p class='msg erro'>O campo está vazio digite um número</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Tabuada</h1>

        <?php if (!empty($erro)) {
            echo $erro;
        }?>

        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="inputBox">
                <input type="number" name="num" placeholder="Digite um número" value="<?= isset($_POST['num']) ? $_POST['num']: '' ?>">
            </div>

            <button type="submit" name="calcular" class="btn">Gerar Tabuada</button>
        </form>

        <?php if(isset($num)): ?>
            <div id="res">
                <?php while($c <= 12): ?>
                    <p><?= "$num X $c = ".($num* $c)?></p>
                    <?php $c++; ?>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div id="res">
                <p>Nada para gerar...</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>