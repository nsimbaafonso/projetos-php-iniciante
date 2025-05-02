<?php
if (isset($_POST['calcular'])) {
    $ano = htmlspecialchars($_POST['ano']);
    $sexo = htmlspecialchars($_POST['sexo']);
    $anoAtual = date("Y");
    $idade = $anoAtual - $ano;
    $genero = "";
    $erro = "";

    if($ano == 0 || $ano > $anoAtual){
        $erro = "<p class='msg erro'>Verifique os dados e tente novamente</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Idade</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>
<body>
    <section>
        <h1>Calculo de Idade</h1>

        <?php if(!empty($erro)): echo $erro; endif;?>

        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="inputBox">
                <input type="number" name="ano" placeholder="Digite seu ano de nascimento" value="<?= isset($_POST['ano']) ? $_POST['ano'] : ''; ?>" min="1970" max="2030" required>
            </div>

            <fieldset><legend>Género</legend>
                <input type="radio" name="sexo" id="M" value="M" <?= isset($_POST['sexo']) &&  $_POST['sexo'] == "M" ? "checked" : '' ?>>
                <label for="M">Masculino</label>
                <input type="radio" name="sexo" id="F" value="F" <?= isset($_POST['sexo']) &&  $_POST['sexo'] == "F" ? "checked" : '' ?>>
                <label for="F">Feminino</label>
            </fieldset>

            <button type="submit" name="calcular" class="btn">Calcular</button>
        </form>

        <?php if(isset($ano) AND isset($sexo)): ?>
            <div id="res">
                <?php if($sexo == "M"): ?>
                    <?php $genero = "Homem";?>
                    <?php if($idade >= 0 && $idade < 11): ?>
                        <p>Detectamos um <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/menino.jpg" alt="Menino">
                    <?php elseif($idade < 21): ?>
                        <p>Detectamos um <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/homemjovem.jpg" alt="Homem Jovem">
                    <?php elseif($idade < 50): ?>
                        <p>Detectamos um <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/homemadulto.jpg" alt="Homem Adulto">
                    <?php else: ?>
                        <p>Detectamos um <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/homemvelho.jpg" alt="Homem Velho">
                    <?php endif; ?>
                <?php elseif($sexo == "F"): ?>
                    <?php $genero = "Mulher";?>
                    <?php if($idade >= 0 && $idade < 11): ?>
                        <p>Detectamos uma <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/menina.jpg" alt="Menina">
                    <?php elseif($idade < 21): ?>
                        <p>Detectamos uma <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/mulherjovem.jpg" alt="Mulher Jovem">
                    <?php elseif($idade < 50): ?>
                        <p>Detectamos uma <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/mulheradulta.jpg" alt="Mulher Adulta">
                    <?php else: ?>
                        <p>Detectamos uma <?= $genero;?> de <?= $idade;?> anos.</p>
                        <img src="img/mulhervelha.jpg" alt="Mulher Velha">
                    <?php endif; ?>
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