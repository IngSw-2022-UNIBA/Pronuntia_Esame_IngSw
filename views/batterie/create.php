<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Batterie */

$this->title = 'Create Batterie';
$this->params['breadcrumbs'][] = ['label' => 'Batteries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batterie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
