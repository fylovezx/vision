<?php
//获取oplib 书库管理请使用AjaxDbmOplib函数
//此页面不包含oplib 相关内容
session_start();
if(isset($_GET['page'])){
$dbmpage = $_GET['page'];
}else{
$dbmpage='opdb';
}
$_SESSION['pageinfo']['dbm-index'] =$dbmpage;//方便刷新回到这里
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
switch ($dbmpage)
{
case "opdb":
//----------------------------opdb-数据库管理-------begin-------------------------------
echo <<<opbd
<div id="dbm-CtLoc">数据库管理</div>
        <div id="opdbmenu">
        <style>
        #opdbmenu span{
            color:green;
            }
        </style>
        <span id="skpl" onclick="AjaxDbmOpdb(this)" onmouseover="DbmOpdbTipin('操作提示：删除数据库,将失去所有数据,在此操作前请确认铺盖已卷好！')" onmouseout="DbmOpdbTipinout()">删库跑路</span>
        <span id="cxks" onclick="AjaxDbmOpdb(this)" onmouseover="DbmOpdbTipin('操作提示：删除原来所有数据并重建数据库结构,您将失去所有数据')" onmouseout="DbmOpdbTipinout()">重新开始</span>
        <span id="sjhf" onclick="AjaxDbmOpdb(this)" onmouseover="DbmOpdbTipin('操作提示：删除原来的数据并从sql文件中重新导入数据，您亦失去之前的所有数据')" onmouseout="DbmOpdbTipinout()">数据恢复</span>
        <span id="bfsj" onclick="AjaxDbmOpdb(this)" onmouseover="DbmOpdbTipin('操作提示：这个选择太明智了，一定要定期备份数据库哦！')" onmouseout="DbmOpdbTipinout()">备份数据</span>
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
                    rstodisplaytable($rs,$fieldarray,$tharray);
                }else{
                    echo "          数据库中没有表,这个宇宙空空如也，快重建它！";
                }                
            }else{
                echo "          上一个程序员删库跑路了，这个数据库不存在。<br>My hero ,宇宙需要你来重建！\r\n";
            }
        echo "          </div>";
        echo "                  </div>";
//----------------------------opdb-数据库管理-------end-------------------------------
    break;
case "opliblog":
//----------------------------opliblog-书库管理日志-------begin-------------------------------        
        echo "<div id=\"dbm-CtLoc\">书库管理日志</div>";
        $sql = "SELECT * FROM $db.opliblog ORDER BY mtime DESC";
        $rs = $conne->getRowsArray($sql) ;
        if(count($rs)){
            $fieldarray =array('mtime','userid','username','abs');
            $tharray =array('时间',"用户id",'用户名',"摘要");
            rstodisplaytable($rs,$fieldarray,$tharray);
        }else{
            echo "          当前没有操作！";
        }
//----------------------------opliblog-书库管理日志-------end-------------------------------
    break;
default:
    $dbmpage='opdb';//出现其他情况，则跳转回数据库管理
    break;
}
$conne->close_conn();
?>