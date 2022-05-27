<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizi */
/* @var $idTerapia */
/* @var $stato */

$this->title = $model->idEsercizio;
\yii\web\YiiAsset::register($this);

if($stato == 2){
    $testo = "Esercizio non ancora svolto";
}
if($stato == 0){
    $testo = "Esercizio svolto male";
}
if($stato == 1){
    $testo = "Esercizio già svolto corettamente";
}
?>

<h1><?= Html::encode($testo) ?></h1>

<iframe id="frame" style="border:0px;width:100%;height:500px" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
<script>

    let frame = document.getElementById("frame");
    let $var = <?php echo json_encode($model->link, JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
    frame.src = $var;


</script>


<div class="esercizi-view" id="elem">
    <p>
        <?= Html::a('Bene', ['esercizifatti/bene', 'idEsercizio' => $model->idEsercizio, 'idTerapia' => $idTerapia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Male', ['esercizifatti/male', 'idEsercizio' => $model->idEsercizio, 'idTerapia' => $idTerapia], ['class' => 'btn btn-danger']) ?>
    </p>

</div>

<script>
    let s = <?php echo json_encode($stato, JSON_HEX_TAG); ?>;
    if(s == 1){
        document.getElementById("elem").style.display = "none";
    }
</script>
