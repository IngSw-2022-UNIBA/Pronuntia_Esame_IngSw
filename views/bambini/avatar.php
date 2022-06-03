<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "titolo";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


$var = "https://sketchfab.com/models/1a7ac5e5268f4fbd88dacc9601c2ca4d/embed"; 
?>

<iframe id="frame" style="border:0px;width:100%;height:500px" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
<script>
    let frame = document.getElementById("frame");
    let $var = <?php echo json_encode($var, JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
    frame.src = $var;
</script>