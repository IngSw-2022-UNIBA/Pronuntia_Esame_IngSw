<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CuratoDa */

$this->title = 'Update Curato Da: ' . $model->idLogopedista;
$this->params['breadcrumbs'][] = ['label' => 'Curato Das', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLogopedista, 'url' => ['view', 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'idBambino' => $model->idBambino]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curato-da-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
