<?php

use app\models\Bambini;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caregiver-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'idUtente')->hiddenInput(array('value'=>Yii::$app->user->id))->label(false) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataDiNascita')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'it',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true],
    ]) ?>

    <?= $form->field($model, 'CF')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase']) ?>

    <?= $form->field($model, 'emailBambino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordBambino')->passwordInput() ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
