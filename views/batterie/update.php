<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Batterie */

$this->title = 'Update Batterie: ' . $model->idBatteria;
$this->params['breadcrumbs'][] = ['label' => 'Batteries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBatteria, 'url' => ['view', 'idBatteria' => $model->idBatteria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="batterie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
