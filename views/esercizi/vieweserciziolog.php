<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizi */
/* @var $stato */

$this->title = $model->idEsercizio;
\yii\web\YiiAsset::register($this);


?>

<br><br><br>
<iframe id="frame" style="border:0px;width:100%;height:500px" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
<script>

    let frame = document.getElementById("frame");
    let $var = <?php echo json_encode($model->link, JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
    frame.src = $var;


</script>

    <p>
<?= Html::a('Torna a elenco Batterie', ['batterie/batteriedellog', 'idLogopedista' => Yii::$app->user->id], ['class' => 'btn btn-primary']) ?>
    </p>
