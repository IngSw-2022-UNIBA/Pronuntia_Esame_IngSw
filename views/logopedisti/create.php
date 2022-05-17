<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedisti */

$this->title = 'Create Logopedisti';
$this->params['breadcrumbs'][] = ['label' => 'Logopedistis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logopedisti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
