<?php

use app\models\TerapiaAssegnata;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaAssegnataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapia Assegnatas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-assegnata-index">

    <h1><?= Html::encode("Elenco delle terapie del bambino") ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idBatteria',
            'data',
            'Diagnosi:ntext',
        ],
    ]); ?>


</div>
