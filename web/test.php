<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/31
 * Time: 9:45
 */

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
</div>

<div id="content">
    tttt
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

    window.onload = function(){
        createDIV(0);
    };

    var createDIV = function(showingID){
        $("#content").append("Some appended text.");
        $("#content").append("222Some appended text.");


        var openDiv = document.createElement("div");
        openDiv.className = "antutu-container";
        openDiv.innerHTML = 'kkkkkkkkkkkkkkkkkkk';
        var openCanvas = document.createElement("canvas");
        openCanvas.id = "antutu"+showingID;
        //openCanvas.addText("ooooooo");
        openDiv.appendChild(openCanvas);

        $("#content").append(openDiv);
        //document.body.appendChild(openDiv);


        ////////////////////////////////
        var parentdiv=$('<div></div>');        //创建一个父div
        //parentdiv.attr('id', showingID);        //给父div设置id
        parentdiv.addclass('antutu-container');    //添加css样式

        var childdiv=$('<canvas></canvas>');        //创建一个子div
        childdiv.attr('id', showingID);            //给子div设置id
        childdiv.appendto(parentdiv);        //将子div添加到父div中

        parentdiv.appendto('#content');            //将父div添加到content中
    }

</script>