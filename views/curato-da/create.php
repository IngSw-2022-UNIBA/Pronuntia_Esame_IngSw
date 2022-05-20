<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CuratoDa */

$this->title = 'Create Curato Da';
$this->params['breadcrumbs'][] = ['label' => 'Curato Das', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curato-da-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
