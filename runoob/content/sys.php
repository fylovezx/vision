<?php
session_start();
if(isset($_GET['page'])){
$dbmpage = $_GET['page'];
}else{
$dbmpage='opdb';
}
$_SESSION['pageinfo'][1] =$dbmpage;//方便刷新回到这里
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
switch ($dbmpage)
{
case "opdb":
echo <<<opbd
管理数据库<br>
        <div id="opdbmenu">
        <span id="skpl"  style="color:green;" onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除数据库,将失去所有数据,在此操作前请确认铺盖已卷好！')" onmouseout="tipout()">删库跑路</span>
        <span id="cxks"  style="color:green;" onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除原来所有数据并重建数据库结构,您将失去所有数据')" onmouseout="tipout()">重新开始</span>
        <span id="sjhf"  style="color:green;"  onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除原来的数据并从sql文件中重新导入数据，您亦失去之前的所有数据')" onmouseout="tipout()">数据恢复</span>
        <span id="bfsj"  style="color:green;"  onclick="opdb(this)" onmouseover="opdbtip('操作提示：这个选择太明智了，一定要定期备份数据库哦！')" onmouseout="tipout()">备份数据</span>
        <input type="text" id="opdbtext" value="">
        </div>
        <div id="tipsdiv" >操作提示：无</div>
        <div id="opdbstatus">
            <div id="opdbrs">暂无操作</div>
            <div id="opdbmain">
opbd;
            //这里需要看是没有数据库，还是有库无表
            if($conne->dbexist()){
                $sql = <<<sql
                SELECT table_name AS tbname,TABLE_COMMENT AS tbcmnt ,TABLE_ROWS as tbrows
                FROM  INFORMATION_SCHEMA.TABLES 
                WHERE table_schema = '$db' ;
sql;
                $rs = $conne->getRowsArray($sql);
                if(count($rs)){
                    $fieldarray =array('tbname','tbcmnt','tbrows');
                    $tharray =array('表名',"$db 数据库中表说明",'当前行数');
                    rstotable($rs,$fieldarray,$tharray);
                }else{
                    echo "          数据库中没有表,这个宇宙空空如也，快重建它！";
                }                
            }else{
                echo "          上一个程序员删库跑路了，这个数据库不存在。<br>My hero ,宇宙需要你来重建！\r\n";
            }
        echo "          </div>";
        echo "                  </div>";
    break;
case "addsf":
        echo "添加书架<br>";
        $sql = "SELECT * FROM $db.shelf ORDER BY sfsnum";
        $rs = $conne->getRowsArray($sql);
        if(count($rs)){
            $fieldarray =array('sfsnum','sfname','idfr','idsf');
            $tharray =array('序号',"书架名称",'楼层','标识');
            rstotable($rs,$fieldarray,$tharray);
        }else{
            echo "          书架表内为空！";
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
        $rs = $conne->getRowsArray($sql) ;
        if(count($rs)){
            $fieldarray =array('bkname','bkintro');
            $tharray =array('书名',"书目简介");
            rstotable($rs,$fieldarray,$tharray);
        }else{
            echo "          一本书都没有啦！";
        }
    break;
case "syslog":        
        echo "操作日志";
        $sql = "SELECT * FROM $db.syslog ORDER BY mtime DESC";
        $rs = $conne->getRowsArray($sql) ;
        if(count($rs)){
            $fieldarray =array('mtime','userid','username','abs');
            $tharray =array('时间',"用户id",'用户名',"摘要");
            rstotable($rs,$fieldarray,$tharray);
        }else{
            echo "          当前没有操作！";
        }
    break;
default:
    $dbmpage='opdb';//出现其他情况，则跳转回数据库管理
    break;
}
$conne->close_conn();
?>