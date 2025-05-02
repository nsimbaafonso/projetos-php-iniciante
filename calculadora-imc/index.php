<?php
if (isset($_POST['calcular'])):
    $valor1 = isset($_POST['peso']) ? $_POST['peso'] : 60.6;
    $valor2 = isset($_POST['peso']) ? $_POST['altura'] : 1.66;

    $peso = htmlspecialchars($valor1);
    $altura = htmlspecialchars($valor2);

    $imc = number_format(($peso / ($altura * $altura)), 2, ',', '.');
    $descricao = "";

    if ($imc < 18.5) {
        $descricao = "<p class='msg erro'>Cuidado! Você está abaixo do peso.</p>";
    } elseif ($imc >= 18.5 AND $imc <= 25) {
        $descricao = "<p class='msg certo'>Você está no peso ideal.</p>";
    } elseif ($imc > 25 AND $imc <= 30) {
        $descricao = "<p class='msg erro'>Cuidado! Você está com sobrepeso.</p>";
    } elseif ($imc > 30 AND $imc <= 35) {
        $descricao = "<p class='msg erro'>Cuidado! Você está com obesidade moderada.</p>";
    } elseif ($imc > 35 AND $imc <= 40) {
        $descricao = "<p class='msg erro'>Cuidado! Você está com obesidade severa.</p>";
    } else {
        $descricao = "<p class='msg erro'>Cuidado! Você está com obesidade morbida.</p>";
    }
          
endif;

?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
    <link type="text/css" rel="stylesheet" href="css/style.css?<?= time();?>">
</head>
<body>
    <section>
        <h1>Calculadora IMC</h1>

        <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
            <div class="inputBox">
                <input type="text" name="peso" class="input" placeholder="Seu peso em Kg" value="<?=isset($_POST['peso']) ? $_POST['peso'] : ''  ?>" required>
            </div>

            <div class="inputBox">
                <input type="text" name="altura" class="input" placeholder="Sua altura em m" value="<?=isset($_POST['altura']) ? $_POST['altura'] : ''  ?>" required>
            </div>

            <button type="submit" name="calcular" class="btn">Calcular</button>
        </form>

        
        <?php if (isset($imc) && isset($descricao)): ?>
            <div id="res">
                <p><?= "Seu IMC é: ".$imc; ?></p>
                <div><?= $descricao ;?></div>
                <p>Clica aqui 👉🏾
                    <a href="https://mundoeducacao.uol.com.br/saude-bem-estar/imc.html" class="msg" target="_blank">
                        Mais informações sobre o IMC
                    </a>
                </p>
            </div>
        <?php else: ?>
            <div id="res" class="hide">
            </div>
       <?php endif; ?>
    </section>
</body>
</html>