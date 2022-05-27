<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizifatti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esercizifatti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTerapia')->textInput() ?>

    <?= $form->field($model, 'idEsercizio')->textInput() ?>

    <?= $form->field($model, 'stato')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
