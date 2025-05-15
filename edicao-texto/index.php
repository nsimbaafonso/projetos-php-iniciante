<?php
if (isset($_POST['formatar'])) {
    $texto = htmlspecialchars($_POST['texto']);
    $cor = htmlspecialchars($_POST['cor']);
    $fundo = htmlspecialchars($_POST['fundo']);
    $tam = htmlspecialchars($_POST['tam']);
    $alinhar = htmlspecialchars($_POST['alinhar']);
    $padding = htmlspecialchars($_POST['padding']);
}

 /**
    * Convert a string to a slug version of itself
    *
    * @param  string $original
    * @return string
*/
 /*public function slug($original)
{
    $slug = str_replace(" ", "-", $original);
    $slug = preg_replace('/[^\w\d\-\_]/i', '', $slug);
    return strtolower($slug);
}*/
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição Texto</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
    <style type="text/css">
        .texto{
            background-color: <?= $fundo;?> !important;
            color: <?= $cor;?> !important;
            font-size: <?= $tam;?>px !important;
            text-align: <?= $alinhar;?> !important;
            padding: <?= $padding;?>px !important;
        }
    </style>
</head>
<body>
    <section>
        <h1>Edição Texto</h1>

        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <fieldset><legend>Opções de formatação</legend>
                <p>
                    <label for="cor">Cor do texto</label>
                    <input type="color" name="cor" id="cor" value="<?= isset($_POST['cor']) ? $_POST['cor'] : '' ?>" required>
                </p>
                <p>
                    <label for="fundo">Fundo do texto</label>
                    <input type="color" name="fundo" id="fundo" value="<?= isset($_POST['fundo']) ? $_POST['fundo'] : '' ?>" required>
                </p>
                <p>
                    <label for="tam">Tamanho do texto</label>
                    <select name="tam" id="tam">
                        <option value="16" <?= isset($_POST['tam']) &&  $_POST['tam'] == 16 ? "selected" : '' ?>>16</option>
                        <option value="18"  <?= isset($_POST['tam']) &&  $_POST['tam'] == 18 ? "selected" : '' ?>>18</option>
                        <option value="20"  <?= isset($_POST['tam']) &&  $_POST['tam'] == 20 ? "selected" : '' ?>>20</option>
                        <option value="25"  <?= isset($_POST['tam']) &&  $_POST['tam'] == 25 ? "selected" : '' ?>>25</option>
                        <option value="30"  <?= isset($_POST['tam']) &&  $_POST['tam'] == 30 ? "selected" : '' ?>>30</option>
                    </select>
                </p>

                <p>
                    <label for="alinhar">Alinhar texto</label>
                    <select name="alinhar" id="alinhar">
                        <option value="left"  <?= isset($_POST['alinhar']) &&  $_POST['alinhar'] == "left" ? "selected" : '' ?>>Esquerda</option>
                        <option value="center"  <?= isset($_POST['alinhar']) &&  $_POST['alinhar'] == "center" ? "selected" : '' ?>>Centro</option>
                        <option value="right" <?= isset($_POST['alinhar']) &&  $_POST['alinhar'] == "right" ? "selected" : '' ?>>Direita</option>
                    </select>
                </p>

                <p>
                    <label for="padding">Espaçamento do texto</label>
                    <select name="padding" id="padding">
                        <option value="5"  <?= isset($_POST['padding']) &&  $_POST['padding'] == 5 ? "selected" : '' ?>>5</option>
                        <option value="7"  <?= isset($_POST['padding']) &&  $_POST['padding'] == 7 ? "selected" : '' ?>>7</option>
                        <option value="10" <?= isset($_POST['padding']) &&  $_POST['padding'] == 10 ? "selected" : '' ?>>10</option>
                    </select>
                </p>
            </fieldset>
            
            <div class="inputBox">
                <textarea name="texto" rows="30" cols="10" placeholder="Digite um texto para formatar..." required><?= isset($_POST['texto']) ? $_POST['texto'] : '' ?></textarea>
            </div>

            <button type="submit" name="formatar" class="btn">Formatar</button>
        </form>

        <?php if(isset($texto)): ?>
            <div id="res">
                <p class="texto"><?= $texto; ?></p>
            </div>
        <?php else: ?>
            <div id="res">
                <p>Nada para mostrar...</p>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>