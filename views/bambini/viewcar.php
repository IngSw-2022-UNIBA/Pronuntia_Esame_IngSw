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
        <?= Html::a('Terapie', ['bambini/terapiebambinocar','idBambino'=> $model->idUtente], ['class' => 'btn btn-secondary']) ?>
        <?= Html::a('Elimina dalla lista', ['caregiver/deletebambinoo'], ['class' => 'btn btn-danger']) ?>
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
