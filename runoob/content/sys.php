<?php 
if(isset($_GET['page'])){
$page = $_GET['page'];
}else{
$page='opdb';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,'vsrbcx');
$db=$conne->getconneinfo('dBase'); 
switch ($page)
{
case "opdb":     
              
        $sql = <<<sql
        SELECT table_name AS tbname,TABLE_COMMENT AS tbcmnt  
        FROM  INFORMATION_SCHEMA.TABLES 
        WHERE table_schema = '$db' ;
sql;
        $rs = $conne->getRowsArray($sql);
echo <<<opbd
管理数据库<br>
        <div id="opdbmenu">
        <span id="skpl"  style="color:green;" onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除数据库,您将失去所有数据')" onmouseout="tipout()">删库跑路</span>
        <span id="cjyz"  style="color:green;" onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除原来所有的数据并重建数据库结构,您将失去所有数据')" onmouseout="tipout()">重建宇宙</span>
        <span id="dgxz"  style="color:green;"  onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除原来的数据并从sql文件中重写数据，您将失去之前的所有数据')" onmouseout="tipout()">打个响指</span>
        </div>
        <div id="tipsdiv" >操作提示：无</div>
        <div id="opdbstatus">
        <div id="opdbrs">暂无操作</div>
        <div id="opdbmain">
opbd;
        if(count($rs)){
            foreach($rs as $tbinfo){
                $tbname = $tbinfo['tbname'];
                $tbcmnt = $tbinfo['tbcmnt'];
                echo "数据表名称：$tbname 说明： $tbcmnt <br>\r\n";
            }
        }else{
            //这里需要看是没有数据库，还是有库无表
            $sql="show databases like '$db'";
            $rs =$conne->getRowsArray($sql);
            include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
            getcmnt(array("runoob","content","sys"),$sql);
            getcmnt(array("runoob","content","sys"),$rs);
            if($rs){
                echo "          数据库中没有表,这个宇宙空空如也，快重建它！";
            }else{
                echo "          上一个程序员删库跑路了，这个数据库不存在。<br>My hero ,宇宙需要你来重建！\r\n";
            }
        }
        echo "          </div></div>";
echo <<<script
                <script>
                function opdbtip(th) {
                    var showDiv = document.getElementById('tipsdiv');
                    showDiv.style.color='red';
                    showDiv.innerHTML = th;
                }

                function tipout() {
                    var showDiv = document.getElementById('tipsdiv');
                    showDiv.style.color='';
                    showDiv.innerHTML = '操作提示：无';
                }

                function opdb(th)
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
                            document.getElementById("opdbstatus").innerHTML=xmlhttp.responseText;
                        }
                    }
                    var timestamp =Date.parse(new Date());
                    xmlhttp.open("GET","content/opdb.php?opdb="+th.id+"&time="+timestamp,true);
                    xmlhttp.send();
                } 
                </script>
script;

    break;
case "addsf":
        $sql = "SELECT * FROM $db.shelf ORDER BY sfsnum";
        $rs = $conne->getRowsArray($sql);
        echo "添加书架<br>";
        foreach($rs as $sflist){
            $idsf = $sflist['idsf'];
            $sfname = $sflist['sfname'];
            $idfr = 1;
            $sfsnum = $sflist['sfsnum'];
            echo "当前书架：序号 => $sfsnum ;标识 =>$idsf ;名称 => $sfname<br>\r\n";
        }
            echo <<<THE
<form action="" method="post">
    序号：<input type="text" name="sfsnum" >名称: <input type="text" name="sfname">
    <input type="submit" name="insertsf" value="提交书架信息">
</form> 
THE;
        break;
case "addbk":
        echo "添加书目<br>";
        
        $sql = "SELECT bkname,bkintro FROM $db.book";
        $rs = $conne->getRowsArray($sql);
        foreach($rs as $bksf){
            $bk = $bksf['bkname'];
            $sf = $bksf['bkintro'];
            echo "书目简介：$sf => $sf <br>";
        }
    break;
case "syslog":
        $sql = "SELECT * FROM $db.syslog";
        $rs = $conne->getRowsArray($sql);
        echo "操作日志<br>";
        foreach($rs as $log){
            $idlog = $log['idlog'];
            $mtime = $log['mtime'];
            $rssql = $log['sql'];
            $username = $log['username'];
            echo "日志序号 => $sfsnum ;操作人 =>$username ;时间 =>$idsf ;<br>内容 => $rssql<br>\r\n";
        }
    break;
default:
    //这里应该是强制跳转;
    break;
}
$conne->close_conn();
?>