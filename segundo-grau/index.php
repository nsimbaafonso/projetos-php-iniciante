<?php
if (isset($_POST['calcular'])) {
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);

    $delta = pow($b, 2) - 4*$a*$c ;
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equação do Segundo Grau</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Equação do 2º Grau</h1>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <div class="inputBox">
                <input type="number" name="a" placeholder="Valor de A" value="<?= isset($_POST['a']) ? $_POST['a'] : ''?>" required>

                <input type="number" name="b" placeholder="Valor de B" value="<?= isset($_POST['b']) ? $_POST['b'] : ''?>" required>

                <input type="number" name="c" placeholder="Valor de C" value="<?= isset($_POST['c']) ? $_POST['c'] : ''?>" required>
            </div>

            <button type="submit" name="calcular" class="btn">Calcular</button>
        </form>

        <?php if(isset($a) && isset($b) && isset($c)): ?>
        <div id="res">
            <p>Equação: <?= $a; ?>X<sup>2</sup> + <?= $b; ?>X + <?= $c; ?> = 0</p>
            <p>Coeficientes: a = <?= $a; ?> | b = <?= $b; ?> | c = <?= $c; ?></p>
            <p>Delta: ∆ = b<sup>2</sup> - 4.a.c</p>
            <p>Delta: ∆ = <?= $b; ?><sup>2</sup> - 4.<?= $a; ?>.<?= $c; ?></p>
            <p>Delta: ∆ = <?= $delta; ?></p>
            <p>Raíz de Delta: √<?= $delta; ?> = <?= $delta < 0 ? "Sem raíz" : number_format(sqrt($delta), 2, ".", ",") ?></p>
            <p>------------------------------------------------------------------------</p>
            <?php if($delta > 0): ?>
                <?php $x1 = (-$b + sqrt($delta)) / (2 * $a); ?>
                <?php $x2 = (-$b - sqrt($delta)) / (2 * $a); ?>
                <p>Se Delta (∆ > 0) for positivo, há duas raízes reais e distintas</p>
                <p>Resultado: X<sub>1</sub> = <?= number_format($x1, 2);?> ; X<sub>2</sub> = <?= number_format($x2, 2);?></p>
                <p>Conjunto Solução: S = {<?= $x1 < 0 ? '' : number_format($x1, 2);?>, <?= $x2 < 0 ? '' : number_format($x2, 2);?>}</p>
            <?php elseif ($delta < 0): ?>
                <p>Se Delta (∆ > 0) for negativo, não existem raízes reais</p>
            <?php elseif ($delta == 0): ?>
                <?php $x1 = (-$b + sqrt($delta)) / (2 * $a); ?>
                <?php $x2 = (-$b - sqrt($delta)) / (2 * $a); ?>
                <p>Se Delta (∆ = 0) for igual a 0 há duas raízes reais e iguais</p>
                <p>Resultado: X<sub>1</sub> = <?= number_format($x1, 2);?> ; X<sub>2</sub> = <?= number_format($x2, 2);?></p>
                <p>Conjunto Solução: S = {<?= $x1 < 0 ? '' : number_format($x1, 2);?>, <?= $x2 < 0 ? '' : number_format($x2, 2);?>}</p>
            <?php else: ?>
                <p class="msg erro">Socorro!...</p>
            <?php endif; ?>
        </div>
        <?php else: ?>
            <div id="res">
                <p>Nada para calcular...</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>