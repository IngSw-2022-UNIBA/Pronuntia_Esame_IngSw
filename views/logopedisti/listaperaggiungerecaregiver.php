<?php

use app\models\Bambini;
use app\models\Caregiver;
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cognome',
            [
                'header' => '',
                'content' => function($model) use ($idBambino) { // se inverto i parametri non funziona
                    $model->idBambino = $idBambino;
                    $model->save();
                    return Html::a('Aggiungi', ['caregiver/aggiungi', 'bambino' => $idBambino], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>



</div>
