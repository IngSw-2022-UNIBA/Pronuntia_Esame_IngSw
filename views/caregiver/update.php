<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = 'Update Caregiver: ' . $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Caregivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUtente, 'url' => ['view', 'idUtente' => $model->idUtente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caregiver-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
