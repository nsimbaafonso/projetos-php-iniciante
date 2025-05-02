<?php
if (isset($_POST['contar'])) {
    $i = htmlspecialchars($_POST['inicio']);
    $f = htmlspecialchars($_POST['fim']);
    $p = htmlspecialchars($_POST['passo']);
    $erro = "";

    if (empty($i) || empty($f) || empty($p)) {
        $erro = "<p class='msg erro'>Faltam dados. Impossível contar...</p>";
    } 

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
        <h1>Contador Super</h1>

        <?php if(!empty($erro)): 
            echo $erro;
        endif; ?>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <div class="inputBox">
                <input type="number" name="inicio" placeholder="Digite o valor inicial" value="<?= isset($_POST['inicio']) ? $_POST['inicio'] : '' ?>">
            </div>
            <div class="inputBox">
                <input type="number" name="fim" placeholder="Digite o valor final" value="<?= isset($_POST['fim']) ? $_POST['fim'] : '' ?>">
            </div>
            <div class="inputBox">
                <input type="number" name="passo" placeholder="Digite o passo" value="<?= isset($_POST['passo']) ? $_POST['passo'] : '' ?>">
            </div>

            <button type="submit" name="contar" class="btn">Contar</button>
        </form>

        <?php if(isset($i) && isset($f) && isset($p)): ?>
            <div id="res">
                <?php if($i < $f):  //contagem crescente?>
                    <?php for ($c = $i; $c <= $f ; $c += $p) { ?>
                        <?= $c;  ?>
                    <?php } ?>
                <?php else:  //contagem decrescente?>
                    <?php for ($c = $i; $c >= $f ; $c -= $p) { ?>
                        <?= $c;  ?>
                    <?php } ?>
                <?php endif;  ?>
            </div>
        <?php else: ?>
            <div id="res">
                <p>Nada para contar...</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>