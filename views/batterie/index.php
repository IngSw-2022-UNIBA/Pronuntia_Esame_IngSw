<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BatterieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batteries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batterie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Batterie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idBatteria',
            'nome',
            'descrizione:ntext',
            'categoria',
            'idLogopedista',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Batterie $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idBatteria' => $model->idBatteria]);
                 }
            ],
        ],
    ]); ?>


</div>
