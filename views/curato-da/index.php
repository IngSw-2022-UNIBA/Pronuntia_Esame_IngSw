<?php

use app\models\CuratoDa;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CuratoDaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Curato Das';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curato-da-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Curato Da', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idBambino',
            'data',
            //'idLogopedista',
            //'idCaregiver',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CuratoDa $model, $key, $index, $column) {
                    //return Url::toRoute(['/bambini/view', 'idUtente' => $model->idBambino]);
                    return Url::toRoute([$action, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'idBambino' => $model->idBambino]);
                 }
            ],
        ],
    ]); ?>


</div>
