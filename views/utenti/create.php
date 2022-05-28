<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utenti */

$this->title = 'Registrati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utenti-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Attenzione! Se sei un caregiver registra prima il bambino e dopo te stesso!</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
