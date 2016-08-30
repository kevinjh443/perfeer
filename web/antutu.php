<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/29
 * Time: 10:55
 * style="display:none"
 */

$product = $_GET['product'] ? $_GET['product'] : "Flash3";
$host = "http://172.24.218.88/perfeer/server/Public/";
$api = "Antutu.GetDetailInfo";

?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Perfeer · Performance</title>

    <link href="./Library/flot/examples.css" rel="stylesheet" type="text/css">
    <script src="./Library/api_sdk_js/jquery.min.js"></script>
    <script src="./Library/api_sdk_js/PhalApi.js"></script>
    <script language="javascript" src="./Library/chart.js/Chart.min.js"></script>

    <style>
        .antutu-container {width:48%; height: 48%; padding-top: 5%}
    </style>

</head>
<body>

<div align="right">
    <a href="Admin/login.php" target="_blank">Login</a>
    <a href="Others/Upload.php" target="_blank">Antutu Upload</a>
</div>

<div id="header">
    <h2>Performance Antutu Score</h2>
    <h3>-<?php echo $product;?></h3>
</div>

<div id="content">
    <div class="antutu-container">
        <canvas id="antutu0" width="30%" height="30%"></canvas>
    </div>

    <div class="antutu-container">
        <canvas id="antutu1" width="30%" height="30%"></canvas>
    </div>

    <div class="antutu-container">
        <canvas id="antutu_ux" width="30%" height="30%"></canvas>
    </div>

    <div class="antutu-container">
        <canvas id="antutu_cpu" width="30%" height="30%"></canvas>
    </div>

    <div class="antutu-container">
        <canvas id="antutu_ram" width="30%" height="30%"></canvas>
    </div>


</div>


<br>
<div id="footer">
    Any question contacts with performance team jianhua.he@tcl.com
    <hr/>
    Copyright &copy; 2016 SH-SWD3-Performance team
</div>

</body>
</html>

<script>

    var url = <?php echo "'".$host."'";?>; //请求地址
    var api = <?php echo "'".$api."'";?>;                    //请求接口

    //使用普通的post请求
    function post(){
        var data = {};
        data['product'] = <?php echo "'".$product."'";?>;

        if(debug == true){
            console.log(data);
        }
        query_post(url, api, data, draw);
    }

    var draw = function(rs) {
        if(rs.ret != 200){
            //如果失败打印失败信息并且做出相应的处理
            alert(rs.msg);
            return;
        }
        var info_count = rs.data.info.length;

        //遍历json数组
        var xaxis = [];
        var yaxis = [];

        var yaxis_3d = [];
        var yaxis_ux = [];
        var yaxis_cpu = [];
        var yaxis_ram = [];
        $.each(rs.data.info, function(i, item) {
            xaxis.push(item.version);
            yaxis.push(item.score);

            yaxis_3d.push(item['3d']);
            yaxis_ux.push(item.ux);
            yaxis_cpu.push(item.cpu);
            yaxis_ram.push(item.ram);
        });

        var showingID = "antutu0";
        //createDIV(showingID);
        showingLine(xaxis, yaxis, showingID, "Total Score");

        showingID = "antutu1";
       // createDIV(showingID);
        showingLine(xaxis, yaxis_3d, showingID, "3D Score");

        showingID = "antutu_ux";
        // createDIV(showingID);
        showingLine(xaxis, yaxis_ux, showingID, "UX Score");

        showingID = "antutu_cpu";
        // createDIV(showingID);
        showingLine(xaxis, yaxis_cpu, showingID, "CPU Score");

        showingID = "antutu_ram";
        // createDIV(showingID);
        showingLine(xaxis, yaxis_ram, showingID, "RAM Score");
    };

    var showingLine = function(xaxis, yaxis, showingID, title) {
        var data = {
            labels: xaxis,
            datasets: [
                {
                    label: title,
                    fill: true,
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    data: yaxis
                }
            ]
        };

        var options = {
            scales: {
                xAxes: [{
                    showLines: true,
                    position: 'bottom'
                }]
            }
        };

        var ctx = document.getElementById(showingID).getContext("2d");
        var myChart = new Chart.Line(ctx, {
            data : data,
            options : options
        });
    };


    window.onload = function(){
        post();
    };


    var createDIV = function(showingID){
        var parentdiv=$('<div></div>');        //创建一个父div
        //parentdiv.attr('id', showingID);        //给父div设置id
        parentdiv.addclass('antutu-container');    //添加css样式

        var childdiv=$('<canvas></canvas>');        //创建一个子div
        childdiv.attr('id', showingID);            //给子div设置id
        childdiv.appendto(parentdiv);        //将子div添加到父div中

        parentdiv.appendto($('#content'));            //将父div添加到content中
    }

</script>