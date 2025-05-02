<?php
//Pega a hora exata de uma região
date_default_timezone_set("Africa/Luanda");
$hora = date('H');
//$hora = 22;
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hora do Dia</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
    <style type="text/css">
        body{
            background: <?php if ($hora >= 0 && $hora < 12) {
                echo "#b6b616";
            } elseif($hora >= 12 && $hora < 18) {
                echo "#bb7c06";
            } else {
                echo "#1f1d1d";
            }
            ?> !important;
        }
    </style>
</head>
<body>
    <section>
        <h1>Hora do Dia</h1>

        <div id="res">
            <p>Agora são <?= $hora; ?> horas</p>
            <?php if($hora >= 0 && $hora < 12): ?>
                <img src="img/fotomanhã.png" alt="Foto da Manhã">
            <?php elseif($hora >= 12 && $hora < 18): ?>
                <img src="img/fototarde.png" alt="Foto da Tarde">
            <?php else: ?>
                <img src="img/fototarde.png" alt="Foto da Noite">
            <?php endif; ?>
        </div>
    </section>
</body>
</html>