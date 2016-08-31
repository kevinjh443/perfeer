<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/29
 * Time: 10:55
 * style="display:none"
 */

$host = "http://172.24.218.88/perfeer/server/Public/";
$api_download = "Antutu.ExportAntutuExcelEmpty";
$api_upload = "Upload.UploadAntutuExcel";

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Perfeer · Performance</title>

    <link href="../Library/flot/examples.css" rel="stylesheet" type="text/css">
    <script src="../Library/api_sdk_js/jquery.min.js"></script>
</head>
<body>

<div align="right" style="padding-top: 5%; padding-right: 5%">
    <form action="<?=$host?>?service=<?=$api_download?>" method="post">
        <input type="submit" value="Download Antutu Data Template"/>
    </form>
</div>

<div id="header">
    <h2>Upload</h2>
</div>
<br><br><br><br>

<center>
    <form action="<?=$host?>?service=<?=$api_upload?>" method="post"
          enctype="multipart/form-data">
        <input type="file" id="file" class="file" name="file" onchange="checkFormat()">
        User name : <input type="text" id="username" class="username" name="username">
        Password : <input type="text" id="password" class="password" name="password">
        <input type="submit" value="提交"/>
    </form>
</center>

<div id="footer">
    Any question contacts with performance team jianhua.he@tcl.com
    <hr/>
    Copyright &copy; 2016 SH-SWD3-Performance team
</div>

</body>
</html>

<SCRIPT>

    function checkFormat(){
        var file_name = $("#file").val();
        console.log(file_name);
        var fileext = file_name.substring(file_name.lastIndexOf("."),file_name.length);
        fileext = fileext.toLowerCase();
        console.log(fileext);
        if (fileext != '.xls' && fileext != '.xlsx'){
            alert("对不起，导入数据格式必须是xls/xlsx格式文件哦，请您调整格式后重新上传，谢谢 ！");
            return false;
        }
        return true;
    }
</SCRIPT>


