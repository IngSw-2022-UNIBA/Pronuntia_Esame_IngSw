<?php

use app\models\Bambini;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BambiniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bambini';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bambini-index">

    <h1><?= Html::encode('Seleziona') ?></h1>

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
                'header' => '',
                'content' => function($model) {
                    return Html::a('Aggiungi', ['bambini/aggiungi' , 'idUtente' => $model->idUtente], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>


</div>
