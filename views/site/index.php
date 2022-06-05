<?php

/** @var yii\web\View $this */

$this->title = 'Pronuntia';
?>

<!DOCTYPE html>
<html>
<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            background-image: url('<?= \Yii::getAlias('@web/immagini/sfondo home.png') ?>');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">

    <div class="site-index">
        <div class="jumbotron text-center bg-transparent">
            <h1 class="display-4" style="font-size:900%;">Pronuntia!</h1>


        </div>
    </div>

</div>



<div class="w3-row-padding w3-center w3-margin-top">
    <div class="w3-third">
        <div class="w3-card w3-container" style="min-height:280px">
            <h3>Piattaforma ALL in One</h3>

            <img src="<?= \Yii::getAlias('@web/immagini/all in one.jpg') ?>"
                 style="height:200px; width:180px">

            <p>Comunica con i tuoi utenti</p>
            <p>Segui i loro progressi</p>
            <p>Mantieni gli appunti</p>
            <p>Salva gli esercizi</p>
        </div>
    </div>

    <div class="w3-third">
        <div class="w3-card w3-container" style="min-height:280px">
            <h3>User Frendly</h3>

            <img src="<?= \Yii::getAlias('@web/immagini/user friendly.jpg') ?>"
                 style="height:200px; width:180px">

            <p>Semplice</p>
            <p>Veloce</p>
            <p>Facile da utilizzare</p>
            <p>Non ne farai più a meno</p>

        </div>
    </div>

    <div class="w3-third">
        <div class="w3-card w3-container" style="min-height:280px">
            <h3>Terapia continua</h3>

            <img src="<?= \Yii::getAlias('@web/immagini/simbolo-h24.png') ?>"
                 style="height:200px; width:180px">

            <p>Dove vuoi</p>
            <p>Quando vuoi</p>
            <p>Con chi vuoi </p>
            <p>Decidi tu quando esercitarti </p>
        </div>
    </div>
</div>



</body>
</html>



