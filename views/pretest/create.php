<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pretest */

$this->title = 'Pretest';
$this->params['breadcrumbs'][] = ['label' => 'Pretests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pretest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
