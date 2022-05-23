<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaAssegnataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terapia-assegnata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTerapia') ?>

    <?= $form->field($model, 'idBatteria') ?>

    <?= $form->field($model, 'idBambino') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'Diagnosi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
