<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizifatti */

$this->title = 'Create Esercizifatti';
$this->params['breadcrumbs'][] = ['label' => 'Esercizifattis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizifatti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
