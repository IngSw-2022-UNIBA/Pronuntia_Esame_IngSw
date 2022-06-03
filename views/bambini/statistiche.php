<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $fattibene */
/* @var $fattimale */
/* @var $media */
/* @var $testo */


$this->title = "Statistiche del bambino";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$media = $media*100;

if($media < 34){
    $testo = "Il Bambino sta andando abbastanza male!";
}elseif ($media < 67){
    $testo = "Il Bambino sta andando abbastanza bene!";
}else{
    $testo = "Il Bambino sta andando molto bene!";
}
?>
<div class="bambini-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1><br><br></h1>


    <h2>Il numero di esercizi fatti bene è: <?= Html::encode($fattibene) ?></h2>

    <h2>Il numero di esercizi fatti male è: <?= Html::encode($fattimale) ?></h2>

    <h2>La percentuale di successo degli esercizi è del: <?= Html::encode($media) ?> %</h2>

    <h1><br><br></h1>
    <h1 style="background-color:powderblue;"><?= Html::encode($testo) ?></h1>


</div>
