<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Perfeer · Performance</title>

    <link href="./Library/flot/examples.css" rel="stylesheet" type="text/css">
    <script src="./Library/api_sdk_js/jquery.min.js"></script>
    <script src="./Library/api_sdk_js/PhalApi.js"></script>
    <script language="javascript" src="./Library/chart.js/Chart.min.js"></script>
</head>
<body>

<div align="right">
    <a href="Admin/login.php" target="_blank">Login</a>
    <a href="Others/Upload.php" target="_blank">Antutu Upload</a>
</div>

<div id="header">
    <h2>Performance Antutu Score</h2>
    <h3>-Flash3</h3>
</div>

<div id="content">
    <div class="antutu-container" style="width:50%; height: 50%;">
        <div id="placeholder" class="antutu-placeholder"></div>
        <center>
            <canvas id="myChart" width="500" height="500"></canvas>
        </center>
    </div>
</div>


<div id="footer">
    Any question contacts with performance team jianhua.he@tcl.com
    <hr/>
    Copyright &copy; 2016 SH-SWD3-Performance team
</div>

</body>
</html>

<script>

    var url = 'http://172.24.218.88/perfeer/server/Public/'; //请求地址
    var api = 'Antutu.GetDetailInfo';                    //请求接口

    //使用普通的post请求
    function post(){
        var rs_data = $('#rs_data').val();

        var data = {};
        data['product'] = 'idol4';

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
        $('#rs_data').val(JSON.stringify(info_count));

        //遍历json数组
        var xaxis = [];
        var yaxis = [];
        $.each(rs.data.info, function(i, item) {
            xaxis.push(item.version);
            yaxis.push(item.score);
        });

        var data = {
            labels: xaxis,
            datasets: [
                {
                    label: "Antutu historian data",
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

        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart.Line(ctx, {
            data : data,
            options : options
        });
    }

    window.onload = function(){
        post();
    };

</script>