<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utentis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utenti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Utenti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUtente',
            'email:email',
            'password',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Utenti $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUtente' => $model->idUtente]);
                 }
            ],
        ],
    ]); ?>


</div>
