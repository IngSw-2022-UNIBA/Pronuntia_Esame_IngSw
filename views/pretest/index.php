<?php

use app\models\Pretest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PretestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pretest';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pretest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'telefono',
            //'idLogopedista',
            //'stato',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pretest $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idPretest' => $model->idPretest]);
                 }
            ],
        ],
    ]); ?>


</div>
