<?php 
if(isset($_GET['page'])){
$page = $_GET['page'];
}else{
$page='main';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne);
switch ($page)
{
case "main":        
        $sql = "SELECT sfname,bkname FROM runoob.book,runoob.shelf where book.idsf = shelf.idsf";
        $rs = $conne->getRowsArray($sql);
        echo "管理主页<br>";
        foreach($rs as $bksf){
            $bk = $bksf['bkname'];
            $sf = $bksf['sfname'];
            echo "当前书目：$sf => $sf <br>";
        }
    break;
case "addsf":
        $sql = "SELECT * FROM runoob.shelf ORDER BY sfsnum";
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
        
        $sql = "SELECT bkname,bkintro FROM runoob.book";
        $rs = $conne->getRowsArray($sql);
        foreach($rs as $bksf){
            $bk = $bksf['bkname'];
            $sf = $bksf['bkintro'];
            echo "书目简介：$sf => $sf <br>";
        }
    break;
    case "addbk":
        $sql = "SELECT * FROM runoob.syslog";
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
    $bool_isdebug =false;
    break;
}

?>