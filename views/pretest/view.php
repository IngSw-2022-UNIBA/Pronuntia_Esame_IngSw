<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pretest */

$this->title = $model->telefono;
\yii\web\YiiAsset::register($this);
?>
<div class="pretest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'idPretest' => $model->idPretest], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'domanda1',
            'domanda2',
            'domanda3',
            'telefono',
        ],
    ]) ?>

</div>
