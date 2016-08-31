<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/31
 * Time: 12:48
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

    <link href="../Library/flot/examples.css" rel="stylesheet" type="text/css">
    <script src="../Library/api_sdk_js/jquery.min.js"></script>
    <script src="../Library/api_sdk_js/PhalApi.js"></script>

    <!-- This is the Javascript file of jqGrid -->
    <script type="text/ecmascript" src="../Library/jqgrid/js/trirand/jquery.jqGrid.min.js"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="../Library/jqgrid/js/trirand/i18n/grid.locale-en.js"></script>
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    <link rel="stylesheet" type="text/css" media="screen" href="../Library/jqgrid/css/jquery-ui.css" />
    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="../Library/jqgrid/css/trirand/ui.jqgrid.css" />

    <style>
        .antutu-container {width:98%; height: 48%; padding-top: 5%}
    </style>

</head>
<body>

<div align="right">
    <a href="../Admin/login.php" target="_blank">Login</a>
    <a href="../Others/Upload.php" target="_blank">Antutu Upload</a>
</div>

<div id="header">
    <h2>Performance Antutu Score</h2>
    <h3>-<?php echo $product;?></h3>
    <h4>--<a href="../antutu.php" target="_blank">Table for Chart data</a></h4>
</div>


    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>


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

    /**
     * 使用普通的post请求
     */
    function post(){
        var data = {};
        data['product'] = <?php echo "'".$product."'";?>;

        if(debug == true){
            console.log(data);
        }
        query_post(url, api, data, readyDraw);
    }

    /**
     * ready to draw chart
     */
    var readyDraw = function(rs) {
        if(rs.ret != 200){
            //如果失败打印失败信息并且做出相应的处理
            alert(rs.msg);
            return;
        }
        var info_count = rs.data.info.length;
        if (info_count <= 0) {
            //var content = document.getElementById("content");
            alert("have no any data in this product!");
            return;
        }

        //遍历json数组
        var data = [];
        var colModel = [];
        var colFlag = false;
        $.each(rs.data.info, function(i, item) {
            var innerItem = {};//初始化

            if(!colFlag) {
                for (var sProp in item) {//存储字段名称
                    colModel.push({label: sProp, name: sProp, width: 75});
                }
            }

            $.each(item, function(j, item_inner) {//添加值，其中j 是字段名称， item_innner是值
                innerItem[j] = item_inner;
            });

            colFlag = true;
            data.push(innerItem);
        });

        drawTables(data, colModel, "Antutu Score All");//table 显示
    };

    var drawTables = function (data, colModel, title) {//table 显示
        $("#jqGrid").jqGrid({
            datatype: "local",
            data: data,
            height: 500 ,
            width: 1500 ,
            colModel: colModel,
            viewrecords: true, // show the current page, data rang and total records on the toolbar
            caption: title
        });
    };

    /**
     * when page ready, auto running here
     */
    window.onload = function(){
        post();
    };

    /**
     * create the div to show chart
     * @param showingID
     */
    var createDIV = function(showingID){
        var openDiv = document.createElement("div");
        openDiv.className = "antutu-container";
        //openDiv.innerHTML = showingID;
        var openCanvas = document.createElement("canvas");
        openCanvas.id = showingID;
        openDiv.appendChild(openCanvas);
        $("#content").append(openDiv);
    }
</script>
