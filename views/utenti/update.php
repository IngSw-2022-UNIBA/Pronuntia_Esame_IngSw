<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utenti */

$this->title = 'Update Utenti: ' . $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Utentis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUtente, 'url' => ['view', 'idUtente' => $model->idUtente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utenti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
