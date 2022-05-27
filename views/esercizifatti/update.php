<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizifatti */

$this->title = 'Update Esercizifatti: ' . $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Esercizifattis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTerapia, 'url' => ['view', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="esercizifatti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
