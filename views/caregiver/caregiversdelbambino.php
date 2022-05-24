<?php

//non ha senso, ma va inserito manualmente 
use app\models\Caregiver;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CaregiverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caregivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caregiver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Caregiver', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cognome',
            [
                'header' => 'Button',
                'content' => function($model) {
                    return Html::a('Apri', ['/caregiver/view', 'idUtente' => $model->idUtente], ['class' => 'btn btn-secondary']);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
