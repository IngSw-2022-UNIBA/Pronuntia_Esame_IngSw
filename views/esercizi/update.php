<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizi */

$this->title = 'Update Esercizi: ' . $model->idEsercizio;
$this->params['breadcrumbs'][] = ['label' => 'Esercizis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEsercizio, 'url' => ['view', 'idEsercizio' => $model->idEsercizio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="esercizi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
