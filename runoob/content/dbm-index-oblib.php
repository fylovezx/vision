<?php
session_start();
if(isset($_GET['struid'])){
$struid = $_GET['struid'];
}else{
    $struid='floor-0';
}

$_SESSION['pageinfo'][1] ='oplib';//方便刷新回到这里
$_SESSION['pageinfo'][2] =$struid;//方便刷新回到这里
$struarray = explode("-",$struid);
$stru = $struarray[0];
$id = $struarray[1];
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
echo <<<style
<style>
#dbm-content span{
    color:blue;
    }
</style>
style;
switch ($stru)
{
case "floor":
//----------------------------floor - shelf 列表--------begin-------------------------------
    $sql = "SELECT * FROM $db.shelf ORDER BY sfsnum";
    $rs = $conne->getRowsArray($sql);
    if(count($rs)){
        echo "<div id=\"dbm-CtLoc\">书架列表</span></div>";
        $fieldarray =array('sfsnum','ctime','sfname','idfr','idsf');
        $tharray =array('序号',"创建时间","书架名称",'楼层','标识');
        //rstodisplaytable($rs,$fieldarray,$tharray);
        $rsrowarray =$rs ;
        echo "\r\n<table width=600px border=\"1px\">\r\n	<tr>\r\n";
        foreach($tharray as $th){
            echo "		<th><nobr>$th</nobr></th>\r\n";
        }
        echo "		<th colspan=2><nobr>操作</nobr></th>\r\n";
        echo "	</tr>\r\n";
        foreach($rsrowarray as $rsrow){
            echo "	<tr >\r\n";
            foreach($fieldarray as $field){
                $result = $rsrow[$field];
                echo "		<td >$result</td>\r\n";
            }
            $struid = "shelf-".$rsrow["idsf"];
            echo "		<td ><span onclick=\"AjaxDbmOplib('$struid')\">进入</span></td>\r\n";
            echo "		<td ><span >编辑</span></td>\r\n";
            echo "	</tr>\r\n";
        }
        echo "</table>\r\n";
    }else{
        echo "          书架表内为空！";
    }
        echo <<<THE
    <form action="" method="post">
    序号：<input type="text" name="sfsnum" >名称: <input type="text" name="sfname">
    <input type="submit" name="insertsf" value="新建书架信息">
    </form> 
THE;
//----------------------------floor - shelf 列表--------end-------------------------------
break;
case "shelf":
//----------------------------shelf - book 列表--------begin-------------------------------
$sql = "SELECT `sfname` FROM $db.shelf where idsf =$id ";
$sfname = $conne->getRowsRst($sql)["sfname"];
echo "<div id=\"dbm-CtLoc\"><span onclick=\"AjaxDbmOplib('floor-0')\">书架列表</span>-><span onclick=\"AjaxDbmOplib('$struid')\">$sfname</span></div>";
    $sql = "SELECT `idbk`, `ctime`, `bkname`, `bksnum` FROM $db.book where idsf =$id ORDER BY bksnum";
    $rs = $conne->getRowsArray($sql);
    if(count($rs)){
        $fieldarray =array('bksnum','ctime','bkname','idbk');
        $tharray =array('序号',"创建时间","书籍名称",'标志号');
        //rstodisplaytable($rs,$fieldarray,$tharray);
        $rsrowarray =$rs ;
        echo "\r\n<table width=600px border=\"1px\">\r\n	<tr>\r\n";
        foreach($tharray as $th){
            echo "		<th><nobr>$th</nobr></th>\r\n";
        }
        echo "		<th colspan=2><nobr>操作</nobr></th>\r\n";
        echo "	</tr>\r\n";
        foreach($rsrowarray as $rsrow){
            echo "	<tr >\r\n";
            foreach($fieldarray as $field){
                $result = $rsrow[$field];
                echo "		<td >$result</td>\r\n";
            }
            $struid = "book-".$rsrow["idbk"];
            echo "		<td ><span >查看详情</span></td>\r\n";
            echo "		<td ><span >编辑</span></td>\r\n";
            echo "	</tr>\r\n";
        }
        echo "</table>\r\n";
    }else{
        echo "          一本书都没有啊！";
    }
//----------------------------shelf - book 列表--------end---------------------------------
break;
}

?>