<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utenti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utenti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoUtente')->dropDownList([
            '1'=>'Logopedista',
            '2' =>'Caregiver',
            '3'=>'Paziente'],
        ['prompt'=>'Seleziona Tipo']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
