<?php

use app\models\Esercizi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EserciziSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $idBatteria */

$this->title = 'Esercizis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Esercizi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'testo:ntext',
            'link',
            [
                'header' => '',
                'content' => function($model) use($idBatteria){
                    return Html::a('Aggiungi', ['/esercizi/aggiungiabat', 'idBatteria' => $idBatteria, 'idEsercizio' => $model->idEsercizio], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>


</div>
