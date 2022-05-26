<?php

use app\models\Esercizi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EserciziSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esercizi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizi-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'testo:ntext',
            [
                'header' => '',
                'content' => function($model){
                    return Html::a('avvia', ['esercizi/viewesercizio', 'idEsercizio' => $model->idEsercizio], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>


</div>
