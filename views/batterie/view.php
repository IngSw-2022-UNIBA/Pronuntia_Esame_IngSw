<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Batterie */

$this->title = $model->idBatteria;
$this->params['breadcrumbs'][] = ['label' => 'Batteries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="batterie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idBatteria' => $model->idBatteria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idBatteria' => $model->idBatteria], [
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
            'idBatteria',
            'nome',
            'descrizione:ntext',
            'categoria',
            'idLogopedista',
        ],
    ]) ?>

</div>
