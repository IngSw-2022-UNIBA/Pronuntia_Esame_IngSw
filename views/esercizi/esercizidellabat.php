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

$this->title = 'Esercizi della batteria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aggiungi Esercizi', ['index', 'idBatteria' => $idBatteria], ['class' => 'btn btn-success']) ?>
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
                    return Html::a('Rimuovi', ['/esercizi/rimuovidallabat', 'idBatteria' => $idBatteria, 'idEsercizio' => $model->idEsercizio], ['class' => 'btn btn-danger']);
                }
            ],
        ],
    ]); ?>


</div>
