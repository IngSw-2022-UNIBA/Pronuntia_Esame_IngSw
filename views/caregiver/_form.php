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

    <?= $form->field($model, 'idBambino')->dropDownList(
        ArrayHelper::map(Bambini::find()->all(), 'idUtente', 'nome'), ['prompt'=>'Seleziona']);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
