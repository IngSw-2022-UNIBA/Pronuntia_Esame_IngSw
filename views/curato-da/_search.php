<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CuratoDaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curato-da-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'idLogopedista') ?>

    <?= $form->field($model, 'idCaregiver') ?>

    <?= $form->field($model, 'idBambino') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
