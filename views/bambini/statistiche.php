<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $fattibene */
/* @var $fattimale */
/* @var $media */
/* @var $testo */


$this->title = "Statistiche del bambino";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$media = $media*100;

if($media==0){
    $testo = "Numero di esercizi non sufficiente!";
} elseif($media < 34){
    $testo = "Il Bambino sta andando abbastanza male!";
}elseif ($media < 67){
    $testo = "Il Bambino sta andando abbastanza bene!";
}else{
    $testo = "Il Bambino sta andando molto bene!";
}
?>


<h1><?= Html::encode($this->title) ?></h1>
<h1></h1>

<?php
if($media < 1){
    $test_ok = 1;
    $test_no = 1;
}else {
    $test_ok = $fattibene;
    $test_no = $fattimale;
}
?>

<html lang="it">
<head>
    <title>Grafico statistiche</title>
    <meta charset="utf-8">
    <script src="https://d3js.org/d3.v4.js"></script>
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
</head>
<body>
<!-- Crea il div dove il grafico verrà posto -->
<div id="grafico_donut"></div>
<script>
    // imposta dimensioni e margini del grafico
    var width = 450
    height = 450
    margin = 100


    var radius = Math.min(width, height) / 2 - margin

    var svg = d3.select("#grafico_donut")
        .append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");


    // Inseriamo i dati
    var data = {Superati : <?= Html::encode($test_ok) ?> ,
                Falliti : <?= Html::encode($test_no) ?>
    }


    // imposta la scala dei color
    var color = d3.scaleOrdinal()
        .domain(["Superati", "Falliti"])
        .range(d3.schemeDark2);


    // Calcola la posizione di ogni gruppo sul grafico a torta:
    var pie = d3.pie()
        .sort(null) // Non ordinare il gruppo per dimensione
        .value(function(d) {return d.value; })
    var data_ready = pie(d3.entries(data))
    // Generatore di arco
    var arc = d3.arc()
        .innerRadius(radius * 0.5) // Dimensioni del foro donut
        .outerRadius(radius * 0.8)
    // Quest'altro arco non verrà disegnato.
    var outerArc = d3.arc()
        .innerRadius(radius * 0.9)
        .outerRadius(radius * 0.9)
    // Costruisci il grafico a torta:
    svg
        .selectAll('allSlices')
        .data(data_ready)
        .enter()
        .append('path')
        .attr('d', arc)
        .attr('fill', function(d){ return(color(d.data.key)) })
        .attr("stroke", "white")
        .style("stroke-width", "2px")
        .style("opacity", 0.7)

    // Aggiungi le polilinee tra il grafico e le etichette:
    svg
        .selectAll('allPolylines')
        .data(data_ready)
        .enter()
        .append('polyline')
        .attr("stroke", "black")
        .style("fill", "none")
        .attr("stroke-width", 1)
        .attr('points', function(d) {
            var posA = arc.centroid(d) // inserimento della linea nella fetta
            var posB = outerArc.centroid(d) // interruzione di riga
            var posC = outerArc.centroid(d); // Posizione etichetta = posB
            var midangle = d.startAngle + (d.endAngle - d.startAngle) / 2 // angolo per la posizione X a destra o a sinistra
            posC[0] = radius * 0.95 * (midangle < Math.PI ? 1 : -1); // moltiplicare per 1 o -1 per metterlo a destra o a sinistra
            return [posA, posB, posC]
        })
    // Aggiungi le polilinee tra il grafico e le etichette:
    svg
        .selectAll('allLabels')
        .data(data_ready)
        .enter()
        .append('text')
        .text( function(d) { console.log(d.data.key) ; return d.data.key } )
        .attr('transform', function(d) {
            var pos = outerArc.centroid(d);
            var midangle = d.startAngle + (d.endAngle - d.startAngle) / 2
            pos[0] = radius * 0.99 * (midangle < Math.PI ? 1 : -1);
            return 'translate(' + pos + ')';
        })
        .style('text-anchor', function(d) {
            var midangle = d.startAngle + (d.endAngle - d.startAngle) / 2
            return (midangle < Math.PI ? 'start' : 'end')
        })
</script>
</body>
</html>



<div class="bambini-view">

    <h1 style="background-color:powderblue;"><?= Html::encode($testo) ?></h1>
    <br><br>
    <h3>Il numero di esercizi fatti bene è: <?= Html::encode($fattibene) ?></h3>

    <h3>Il numero di esercizi fatti male è: <?= Html::encode($fattimale) ?></h3>

    <h2>La percentuale di successo degli esercizi è del: <?= Html::encode($media) ?> %</h2>

</div>


