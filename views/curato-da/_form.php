<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CuratoDa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curato-da-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'idLogopedista')->textInput() ?>

    <?= $form->field($model, 'idCaregiver')->textInput() ?>

    <?= $form->field($model, 'idBambino')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
