<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaAssegnata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terapia-assegnata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idBatteria')->textInput() ?>

    <?= $form->field($model, 'idBambino')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'Diagnosi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
