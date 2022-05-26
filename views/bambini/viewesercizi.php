<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bambini */
/* @var $var  */

$this->title = $model->idUtente;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


$var = "https://learningapps.org/watch?v=p8qaap7ba20"; // bisogna passare il link dal database ---------------------
?>

<iframe id="frame" style="border:0px;width:100%;height:500px" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
<script>
    let frame = document.getElementById("frame");
    let $var = <?php echo json_encode($var, JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
    frame.src = $var;
</script>


<div class="bambini-view">
    <p>
        <?= Html::a('Bene', ['layouts/main'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Male', ['layouts/main'], ['class' => 'btn btn-danger']) ?>
    </p>

</div>
