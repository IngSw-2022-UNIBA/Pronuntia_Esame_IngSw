<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pretest */

$this->title = 'Update Pretest: ' . $model->idPretest;
$this->params['breadcrumbs'][] = ['label' => 'Pretests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPretest, 'url' => ['view', 'idPretest' => $model->idPretest]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pretest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
