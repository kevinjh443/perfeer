<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Perfeer · Performance</title>

    <link href="./Library/flot/examples.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="./Library/chart.js-php/Chart.js"></script>
    <script language="javascript" src="./Library/chart.js-php/chart.js-php.js"></script>
    <?php
        //init
        require_once './Library/api_sdk/PhalApiClient.php';
        require './Library/chart.js-php/class/ChartJS.php';
        require './Library/chart.js-php/class/ChartJS_Line.php';

        $client = PhalApiClient::create()
            ->withHost('http://127.0.0.1/perfeer/server/Public/');

    ?>

</head>
<body>

<div id="header">
    <h2>Performance Antutu Score</h2>
    <h3>-Flash3</h3>
</div>

<div id="content">
    <div class="antutu-container">
        <div id="placeholder" class="antutu-placeholder"></div>
    </div>
</div>

<?php

$rs = $client->reset()
    ->withService('Antutu.GetDetailInfo')
    ->withParams('product', 'Flash3')
    ->withTimeout(5000)
    ->request();

if($rs->getRet() != 200) {
    echo "<br><br><b> ".$rs->getMsg()." </b> <br><br>";
    exit;
}
$rs = $rs->getData()['info'];

//var_dump($rs); //for test
$count_info = count($rs);
$xaxis = array();
$yaxis = array();

foreach($rs as $item) {
    array_push($xaxis, $item['version']);
    array_push($yaxis, $item['score']);
}

$Line = new ChartJS_Line('example', 500, 500);
$Line->addLine($yaxis);
$Line->addLabels($xaxis);

echo "<center>".$Line."</center>";
?>

<div id="footer">
    Any question contacts with performance team jianhua.he@tcl.com
    <hr/>
    Copyright &copy; 2016 SH-SWD3-Performance team
</div>
</body>
</html>

<script>
    (function() {
        loadChartJsPhp();
    })();
</script>
