<?php
/**
 * 系统管理员主页
 * 利用js技术实现网站内容的切换
 *  
 * 
 */

if(isset($_POST['insertsf'])){
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,'vsrbxr');
    $db=$conne->getconneinfo('dBase'); 
    $sfname = $_POST['sfname'];
    $sfsnum = $_POST['sfsnum'];
    $idfr =1;
    $sql1= <<<transaction
    UPDATE `$db`.`shelf` SET `sfsnum` = `sfsnum`+1 WHERE `sfsnum` >=$sfsnum and `idfr`=$idfr;
    INSERT INTO `$db`.`shelf` (`sfname`, `idfr`, `sfsnum`) VALUES ('$sfname', $idfr, $sfsnum);
transaction;
    $sql2=str_replace("'","\'",$sql1);
    $sql= <<<transaction
    $sql1
    INSERT INTO `$db`.`syslog` (`mtime`, `sql`, `username`) VALUES (Now(), '$sql2', 'sys');
transaction;
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
getcmnt(array("runoob","sysindex"),$sql1);
getcmnt(array("runoob","sysindex"),$sql2);
getcmnt(array("runoob","sysindex"),$sql);

$conne->close_conn();
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
        function changepage(th)
        {
            var xmlhttp;
            cgbgcolor(th.id);
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
    <div id="sysmenu">
        <span id="opdb"  onclick="changepage(this)">管理数据库</span>
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
<script>
    function cgbgcolor(th){
        document.getElementById(th).style.background =  '#c3d08d';
        setTimeout(function(){ document.getElementById(th).style.background =  ''; }, 3000);
    }
    cgbgcolor('opdb');
</script>

</body>
</html>