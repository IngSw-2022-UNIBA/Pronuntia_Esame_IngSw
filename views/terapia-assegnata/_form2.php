<?php

use app\models\Bambini;
use app\models\Batterie;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaAssegnata */
/* @var $form yii\widgets\ActiveForm  */
?>

<div class="terapia-assegnata-form">

    <?php $form = ActiveForm::begin();
    $logopedista = Yii::$app->user->id;
    ?>

    <?= $form->field($model, 'idBatteria')->dropDownList(
        ArrayHelper::map(Batterie::find()->where("idLogopedista = '$logopedista'")->all(), 'idBatteria', 'nome'), ['prompt'=>'Seleziona']);
    ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'Diagnosi')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
