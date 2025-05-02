<?php
if (isset($_POST['calcular'])) {
    $num = htmlspecialchars($_POST['num']);
    $exp = htmlspecialchars($_POST['exp']);
    $operacao = htmlspecialchars($_POST['operacao']);
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Operações</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Calculo de Operações</h1>

        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="inputBox">
                <input type="number" name="num" placeholder="Digite um número" value="<?= isset($_POST['num']) ? $_POST['num'] : ''; ?>" step="0.1" required>
            </div>

            <div class="inputBox">
                <input type="number" name="exp" placeholder="Digite um expoente para potência" value="<?= isset($_POST['exp']) ? $_POST['exp'] : 0; ?>" step="0.1" required>
            </div>

            <fieldset><legend>Escolha uma Operação</legend>
                <input type="radio" name="operacao" id="potencia" value="potencia" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "potencia" ? "checked" : '' ?>>
                <label for="potencia">Potência</label>
                <input type="radio" name="operacao" id="raiz" value="raiz" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "raiz" ? "checked" : '' ?>>
                <label for="raiz">Raiz Quadrada</label>
                <input type="radio" name="operacao" id="abs" value="abs" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "abs" ? "checked" : '' ?>>
                <label for="abs">Valor Absoluto</label>
                <input type="radio" name="operacao" id="arredondar" value="arredondar" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "arredondar" ? "checked" : '' ?>>
                <label for="arredondar">Arredondar</label>
                <input type="radio" name="operacao" id="arredondar-excesso" value="arredondar-excesso" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "arredondar-excesso" ? "checked" : '' ?>>
                <label for="arredondar-excesso">Arredondar por Excesso</label>
                <input type="radio" name="operacao" id="arredondar-defeito" value="arredondar-defeito" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "arredondar-defeito" ? "checked" : '' ?>>
                <label for="arredondar-defeito">Arredondar por Defeito</label>
                <input type="radio" name="operacao" id="seno" value="seno" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "seno" ? "checked" : '' ?>>
                <label for="seno">Seno</label>
                <input type="radio" name="operacao" id="cosseno" value="cosseno" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "cosseno" ? "checked" : '' ?>>
                <label for="cosseno">Cosseno</label>
                <input type="radio" name="operacao" id="tangente" value="tangente" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "tangente" ? "checked" : '' ?>>
                <label for="tangente">Tangente</label>
                <input type="radio" name="operacao" id="format-num-dec" value="format-num-dec" <?= isset($_POST['operacao']) &&  $_POST['operacao'] == "format-num-dec" ? "checked" : '' ?>>
                <label for="format-num-dec">Formatar Número Decimais</label>
            </fieldset>

            <button type="submit" name="calcular" class="btn">Calcular</button>
        </form>

        <?php if(isset($num)): ?>
            <div id="res">
                <?php if($operacao == "potencia"): ?>
                    <p><?= $num; ?><sup><?= $exp; ?></sup> = <?= pow($num, $exp); ?></p>
                <?php elseif($operacao == "raiz"): ?>
                    <p>√<?= $num; ?> = <?= sqrt($num); ?></p>
                <?php elseif($operacao == "abs"): ?>
                    <p><?= $num; ?> = <?= abs($num); ?></p>
                <?php elseif($operacao == "arredondar"): ?>
                    <p>Arredondando: <?= $num; ?> = <?= round($num); ?></p>
                <?php elseif($operacao == "arredondar-excesso"): ?>
                    <p>Arredondando por Excesso: <?= $num; ?> = <?= ceil($num); ?></p>
                <?php elseif($operacao == "arredondar-defeito"): ?>
                    <p>Arredondando poe Defeito: <?= $num; ?> = <?= floor($num); ?></p>
                <?php elseif($operacao == "seno"): ?>
                    <p>Sen<?= $num; ?>º = <?= sin($num); ?></p>
                <?php elseif($operacao == "cosseno"): ?>
                    <p>Cos<?= $num; ?>º = <?= cos($num); ?></p>
                <?php elseif($operacao == "tangente"): ?>
                    <p>Tan<?= $num; ?>º = <?= tan($num); ?></p>
                <?php elseif($operacao == "format-num-dec"): ?>
                    <p>Formatando Casas Decimais: <?= $num; ?> = <?= number_format($num, $exp); ?></p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div id="res">
                <p>Nada para calcular....</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>