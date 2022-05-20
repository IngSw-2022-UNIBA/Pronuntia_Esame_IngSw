<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BambiniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bambinis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bambini-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bambini', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUtente',
            'nome',
            'cognome',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bambini $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUtente' => $model->idUtente]);
                 }
            ],
        ],
    ]); ?>


</div>
