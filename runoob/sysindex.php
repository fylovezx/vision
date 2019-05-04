<?php
/**
 * 系统管理员主页
 * 利用js技术实现网站内容的切换
 *  
 * 
 */
if(isset($_POST['insertsf'])){
    $sfname = $_POST['sfname'];
    $sfsnum = $_POST['sfsnum'];
    $idfr =1;
    $sql1= <<<transaction
    UPDATE `runoob`.`shelf` SET `sfsnum` = `sfsnum`+1 WHERE `sfsnum` >=$sfsnum and `idfr`=$idfr;
    INSERT INTO `runoob`.`shelf` (`sfname`, `idfr`, `sfsnum`) VALUES ('$sfname', $idfr, $sfsnum);
transaction;
    $sql2=str_replace("'","\'",$sql1);
    $sql= <<<transaction
    $sql1
    INSERT INTO `runoob`.`syslog` (`mtime`, `sql`, `username`) VALUES (Now(), '$sql2', 'sys');
transaction;
echo $sql1."<br>\r\n";
echo $sql2."<br>\r\n";
echo $sql."<br>\r\n";
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>系统管理员</title>
    <script>
        function changge(th){
            document.getElementById("content").innerHTML=th.id;
        }

        function changepage(th)
        {
            var xmlhttp;
            if (window.XMLHttpRequest)
            {
                //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
                // IE6, IE5 浏览器执行代码
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("content").innerHTML=xmlhttp.responseText;
                }
            }
            var timestamp =Date.parse(new Date());
            xmlhttp.open("GET","content/sys.php?page="+th.id+"&time="+timestamp,true);
            xmlhttp.send();
        }        
    </script>
    <style>
    span
        {
        color:blue;
        font-weight:bold;
        }
    </style>
</head>
<body>
    <div id="head">欢迎进入系统管理界面</div>
    <div id="menu">
        <span id="main"  onclick="changepage(this)">管理主页</span>
        <span id="addsf"  onclick="changepage(this)">添加书架</span>
        <span id="addbk" onclick="changepage(this)">添加书目</span>
        <span id="syslog" onclick="changepage(this)">操作日志</span>
    </div>
    <div id="content">
        <?php
        include_once "content/sys.php";
        ?>
    </div>

    <footer>
<div id="footer">
    <?php    
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/advergers.php'; givemewords($advergerswords,"Tony");
    ?>    
</div>

</footer>

<?php
if(isset($_POST['insertsf'])){
echo <<<insertsf
<script>
document.getElementById("addsf").onclick();
</script>
insertsf;
}
?>

</body>
</html>