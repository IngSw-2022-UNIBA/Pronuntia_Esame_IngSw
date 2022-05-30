<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PretestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pretest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPretest') ?>

    <?= $form->field($model, 'domanda1') ?>

    <?= $form->field($model, 'domanda2') ?>

    <?= $form->field($model, 'domanda3') ?>

    <?= $form->field($model, 'domanda4') ?>

    <?php // echo $form->field($model, 'idLogopedista') ?>

    <?php // echo $form->field($model, 'stato') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
