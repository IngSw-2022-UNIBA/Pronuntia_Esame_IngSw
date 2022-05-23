<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaAssegnataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapia Assegnatas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-assegnata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Terapia Assegnata', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTerapia',
            'idBatteria',
            'idBambino',
            'data',
            'Diagnosi:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TerapiaAssegnata $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTerapia' => $model->idTerapia]);
                 }
            ],
        ],
    ]); ?>


</div>
