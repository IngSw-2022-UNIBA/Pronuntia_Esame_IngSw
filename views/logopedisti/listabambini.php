<?php

use app\models\Bambini;
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

    <h1><?= Html::encode('Lista bambini') ?></h1>

    <p>
        <?= Html::a('Aggiungi Bambino alla lista', ['/logopedisti/listaperaggiungere'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cognome',
            [
                'header' => '',
                'content' => function($model) {
                    return Html::a('Open', ['/bambini/viewlog', 'idUtente' => $model->idUtente], ['class' => 'btn btn-secondary']);
                }
            ],
        ],
    ]); ?>


</div>
