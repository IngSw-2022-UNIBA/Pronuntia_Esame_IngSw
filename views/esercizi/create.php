<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizi */

$this->title = 'Create Esercizi';
$this->params['breadcrumbs'][] = ['label' => 'Esercizis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
