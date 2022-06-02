<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bambini */

$this->title = 'Create Bambini';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bambini-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
