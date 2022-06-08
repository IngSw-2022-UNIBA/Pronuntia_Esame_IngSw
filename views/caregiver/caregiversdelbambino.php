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
/* @var $idBambino */

$this->title = 'Caregivers';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="caregiver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aggiungi un Caregiver al bambino', ['logopedisti/listaperaggiungerecaregiver', 'idBambino' => $idBambino], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Torna alla schermata bambino', ['bambini/viewlog', 'idUtente' => $idBambino], ['class' => 'btn btn-primary']) ?>
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
                'header' => '',
                'content' => function($model) {
                    return Html::a('Apri', ['/caregiver/viewlog', 'idUtente' => $model->idUtente], ['class' => 'btn btn-secondary']);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
