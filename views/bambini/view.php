<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bambini */

$this->title = $model->idUtente;
$this->params['breadcrumbs'][] = $model->nome;
\yii\web\YiiAsset::register($this);

$var_avatar = "https://sketchfab.com/models/1a7ac5e5268f4fbd88dacc9601c2ca4d/embed?autostart=1";

$nome = $model->nome;
$cognome = $model->cognome;
?>
<div class="bambini-view">

    <html>
    <head>
        <title>W3.CSS Template</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
        </style>
    </head>
    <body class="w3-theme-l5">


    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <!-- Profile -->
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container">

                        <h4 class="w3-center">Bentornato ! </h4>


                            <iframe title="GoldFish" frameborder="0"
                                    allowfullscreen mozallowfullscreen="true"
                                    webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking"
                                    xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share
                                    src= <?= Html::encode($var_avatar) ?>
                                    style="height:200px;width:250px" alt="Avatar">
                            </iframe>





                        </p>

                        <hr>
                        <p><i class="w3-left"></i> <?= Html::encode($nome) ?> </p>
                        <p><i class="w3-left"></i> <?= Html::encode($cognome) ?> </p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?= Html::encode($model->dataDiNascita) ?></p>
                    </div>
                </div>
                <br>



                <!-- Alert Box -->
                <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
                    <p><strong>Hey!</strong></p>
                    <p><?= Html::encode($model->notePersonali) ?></p>
                </div>


                <p>
                    <!-- bottoni update e cancella -->

                    <?= Html::a('Update', ['update', 'idUtente' => $model->idUtente], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'idUtente' => $model->idUtente], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Questo processo è IRREVERSIBILE, sicuro di voler continuare?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <div class="w3-col m7">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'idUtente',
                        'nome',
                        'cognome',
                        'CF',


                    ],
                ]) ?>
                </div>



                <!-- End Middle Column -->
            </div>



            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>
    <br>

    </body>
    </html>


</div>
