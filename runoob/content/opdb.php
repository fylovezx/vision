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
    $sql = "USE `$db`;";
    $conne->uidRst($sql);
    $sqlfile=file_get_contents("../data/db/vsrbdbstruct.sql");
    $sqlarray=explode(";",$sqlfile); //用explode()函数把‍$sql字符串以“;”分割为数组 

    foreach($sqlarray as $sqlq){ //遍历数组 
    $sqlq=$sqlq.";"; //分割后是没有“;”的，因为SQL语句以“;”结束，所以在执行SQL前把它加上 
    $conne->uidRst($sqlq);
    } 
    echo "<div id=\"opdbrs\">我也不知道是否重建成功，这段代码需要修改</div>";
    break;
        break;
case "dgxz":

    break;

default:
    //这里应该是强制跳转;
    break;
}
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
        $tharray =array('表名','表说明','当前行数');
        rstotable($rs,$fieldarray,$tharray);
    }else{
        echo "          数据库中没有表,这个宇宙空空如也，快重建它！";
    }                
}else{
    echo "          上一个程序员删库跑路了，这个数据库不存在。<br>My hero ,宇宙需要你来重建！\r\n";
}
echo "          </div>";
echo "                  </div>";
$conne->close_conn();
?>