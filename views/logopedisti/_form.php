<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedisti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logopedisti-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model,'idUtente')->hiddenInput(array('value'=>Yii::$app->user->id))->label(false) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matricola')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inizioServizio')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'it',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true],
    ]) ?>

    <?= $form->field($model, 'specializzazione')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CF')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
