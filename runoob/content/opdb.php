<?php 
if(isset($_GET['opdb'])){
$opdb = $_GET['opdb'];
}else{
$opdb='opdb';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,'vsrbxr');
switch ($opdb)
{
case "skpl":  
    $db=$conne->getconneinfo('dBase');
    $sql = "DROP DATABASE IF EXISTS `$db`;";
    $conne->uidRst($sql);
    $sql ="show databases like '$db'";
    $rs =$conne->getRowsArray($sql);
    if($rs){
        echo "          <div id=\"opdbrs\">删库跑路操作不知为啥失败了,你看着办！</div>";
    }else{
        echo "          <div id=\"opdbrs\">删库跑路操作成功，快跑啊</div>";
    }
    break;
case "cjyz":
    $db=$conne->getconneinfo('dBase');
    $sql = "CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET 'utf8mb4';";
    $conne->uidRst($sql);
    $sql ="show databases like '$db'";
    $rs =$conne->getRowsArray($sql);
    if($rs){
        echo "          <div id=\"opdbrs\">重建宇宙成功！</div>";
    }else{
        echo "          <div id=\"opdbrs\">重建宇宙受到不明的强大力量干扰，快想办法再次重建</div>";
    }    
    break;
        break;
case "dgxz":

    break;

default:
    //这里应该是强制跳转;
    break;
}
$sql = <<<sql
SELECT table_name AS tbname,TABLE_COMMENT AS tbcmnt  
FROM  INFORMATION_SCHEMA.TABLES 
WHERE table_schema = '$db' ;
sql;
$rs = $conne->getRowsArray($sql);
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
$conne->close_conn();
?>