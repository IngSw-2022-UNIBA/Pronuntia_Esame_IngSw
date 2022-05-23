<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaAssegnata */

$this->title = 'Update Terapia Assegnata: ' . $model->idTerapia;
$this->params['breadcrumbs'][] = ['label' => 'Terapia Assegnatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTerapia, 'url' => ['view', 'idTerapia' => $model->idTerapia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-assegnata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
