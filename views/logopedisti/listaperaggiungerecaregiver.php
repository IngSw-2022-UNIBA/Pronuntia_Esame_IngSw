<?php

use app\models\Bambini;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BambiniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $idBambino */

$this->title = 'title';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bambini-index">

    <h1><?= Html::encode('Seleziona') ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    echo $idBambino; // qui idBambino è correttamente funzionante e vale 2
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cognome',
            [
                'header' => '',
                'content' => function($model, $idBambino) {                         // qui vale erroneamente come idUtente
                    return Html::a('Aggiungi', ['caregiver/aggiungi' , 'idBambino' => $idBambino, 'idUtente' => $model->idUtente], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>


</div>
