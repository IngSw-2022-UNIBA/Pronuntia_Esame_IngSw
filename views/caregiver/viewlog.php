<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="caregiver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Rimuovi caregiver', ['caregiver/deletebambino', 'idUtente' => $model->idUtente], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Torna al elenco caregiver', ['caregiver/caregiversdelbambino', 'idBambino' => $model->idBambino], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUtente',
            'nome',
            'cognome',
        ],
    ]) ?>

</div>
