<?php
if(isset($_POST['length'])):
    //Pegando os valores via POST e atribuindo as váriaveis
    $length = intval($_POST['length']);
    $lowercase = htmlspecialchars(isset($_POST['lowercase']));
    $uppercase = htmlspecialchars(isset($_POST['uppercase']));
    $symbols = htmlspecialchars(isset($_POST['symbols']));
    $numbers = htmlspecialchars(isset($_POST['numbers']));

    //verificamos se nenhuma das opções foi selecionadas
    if (!($lowercase) and !($uppercase) and !($symbols) and !($numbers))  {
        echo "Falha ao gerar senha. Escolha uma opção";
    }

    //cadeias de caracteres para gerar a senha
    $lowercase_chars = "abcdefghijklmnopqrstuvxwyz";
    $uppercase_chars = "ABCDEFGHIJKLMNOPQRSTUVXWYZ";
    $symbols_chars = "!@#$%&*()_+=?";
    $numbers_chars = "0123456789";

    $password = "";//guarda a palavra-pass gerada
    $valid_options = "";//guarda as opções dos caracters de validação

    /*se uma variável for verdadeira, adicionamos um grupo caracteres de
    validaçâo a variável $valid_options
    */
    if ($lowercase) $valid_options .= $lowercase_chars;
    if ($uppercase) $valid_options .= $uppercase_chars;
    if ($symbols) $valid_options .= $symbols_chars;
    if ($numbers) $valid_options .= $numbers_chars;

    //o PHP considera um conjunto de caracteres como um array
    for ($i=0; $i < $length; $i++) { 
        //usamos a função rand para gerar conjunto de cacateres aleatórios
        $random_numbers = rand(0, strlen($valid_options) -1);
        //atribuimos o valor gerado a variável $password
        $password .= $valid_options[$random_numbers];
    }

    /*echo "<pre>";
    var_dump($_POST);
    echo "</pre>";*/
endif;

/*if ($_SERVER['REQUEST_METHOD'] !== "POST"):
    die("Idiota...");
endif;*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
        <h1>Gerador de Senhas</h1>
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST" class="form">
            <div class="input">
                <div class="inputGroup">
                    <input type="number" name="length" id="length" placeholder="Tamanho da palavra-pass" min="8" max="100" value="<?=isset($_POST['length']) ?  $_POST['length'] : '';?>" required>
                </div>
            </div>

            <p>
                <label for="lowercase">Incluir letras minúsculas:</label>
                <input type="checkbox" value="1" checked name="lowercase" id="lowercase"> 
            </p>

            <p>
                <label for="uppercase">Incluir letras maiúsculas:</label>
                <input type="checkbox" value="1" checked name="uppercase" id="uppercase"> 
            </p>

            <p>
                <label for="symbols">Incluir símbolos:</label>
                <input type="checkbox" value="1" checked name="symbols" id="symbols"> 
            </p>

            <p>
                <label for="numbers">Incluir números:</label>
                <input type="checkbox" value="1" checked name="numbers" id="numbers"> 
            </p>

            <button class="btn">Gerar Senha</button>
        </form>

        <?php if (isset($password)): ?>
        <h2>Palavra-Pass Gerada</h2>
        <div class="input">
            <div class="inputGroup">
                <input type="text" name="" value="<?= $password;?>" readonly>
            </div>
        </div>
        <?php endif; ?>
    </section>
</body>
</html>