<?php

use app\models\Logopedisti;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pretest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pretest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'domanda1')->textInput() ?>

    <?= $form->field($model, 'domanda2')->textInput() ?>

    <?= $form->field($model, 'domanda3')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'idLogopedista')->dropDownList(
        ArrayHelper::map(Logopedisti::find()->all(), 'idUtente', 'nome'), ['prompt'=>'Seleziona']);
    ?>

    <?= $form->field($model, 'stato')->hiddenInput(array('value'=>0))?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
