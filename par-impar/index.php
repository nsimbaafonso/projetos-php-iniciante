<?php
if (isset($_POST['calcular'])) {
    $num = htmlspecialchars($_POST['num']);
    $erro = "";

    if (empty($num)) {
        $erro = "<p class='msg erro'>O campo está vazio, deve ser preenchido</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par ou Ímpar</title>
    <link rel="stylesheet" href="css/style.css?<?= time();?>">
</head>
<body>
    <section>
        <h1>Par ou Ímpar</h1>

        <?php if (!empty($erro)) {
            echo $erro;
        }?>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <div class="inputBox">
                <input type="number" name="num" placeholder="Digite um número" value="<?= isset($_POST['num']) ? $_POST['num'] : ''?>">
            </div>

            <button type="submit" name="calcular" class="btn">Calcular</button>
        </form>

        <?php if(isset($num)):?>
            <div id="res">
                <?php if($num % 2 == 0):?>
                    <p class="msg certo">O número <?= $num; ?> é par</p>
                <?php else: ?>
                    <p class="msg erro">O número <?= $num; ?> é ímpar</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div id="res" class="hide">
                <p>Nada para verificar...</p>
            </div>
        <?php endif;?>
    </section>
</body>
</html>