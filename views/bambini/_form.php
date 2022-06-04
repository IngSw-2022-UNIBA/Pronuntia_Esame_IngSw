<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Bambini */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="bambini-form">

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


    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
