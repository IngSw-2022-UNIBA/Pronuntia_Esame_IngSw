<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bambini */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="bambini-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Terapie', ['bambini/terapiebambino','idBambino'=> $model->idUtente], ['class' => 'btn btn-secondary']) ?>
        <?= Html::a('Aggiorna profilo', ['bambini/update2', 'idUtente'=> $model->idUtente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Elimina dalla lista', ['bambini/deletelog','idUtente'=> $model->idUtente], ['class' => 'btn btn-danger']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUtente',
            'nome',
            'cognome',
            'CF',
            'dataDiNascita',
            'notePersonali',
        ],
    ]) ?>

    <p>
        <?= Html::a('Caregivers', ['caregiver/caregiversdelbambino', 'idBambino'=> $model->idUtente], ['class' => 'btn btn-primary']) ?>

    </p>

</div>
