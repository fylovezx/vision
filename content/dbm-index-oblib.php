<?php
session_start();
if(isset($_GET['struid'])){
$struid = $_GET['struid'];
}else{
    $struid='floor-0';
}

$_SESSION['pageinfo']['dbm-index'] =array('oplib'=>'');//方便刷新回到这里
$_SESSION['pageinfo']['dbm-index']['oplib'] =$struid;//方便刷新回到这里
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
    cursor:pointer;
    }
</style>
style;
switch ($stru)
{
case "floor":
    $idfl = 1;
//----------------------------floor - shelf 列表--------begin-------------------------------
    $sql = "SELECT * FROM $db.shelf WHERE idfl=$idfl ORDER BY sfsnum";
    $rssfarr = $conne->getRowsArray($sql);
    if(count($rssfarr)){
        echo "<div id=\"dbm-CtLoc\">书架列表</span></div>";
        $fieldarray =array('sfsnum','ctime','sfname','idfl','idsf');
        $tharray =array('序号',"创建时间","书架名称",'楼层','标识');
        //rstodisplaytable($rs,$fieldarray,$tharray);
        echo "\r\n<table width=600px border=\"1px\">\r\n	<tr>\r\n";
        foreach($tharray as $th){
            echo "		<th><nobr>$th</nobr></th>\r\n";
        }
        echo "		<th colspan=2><nobr>操作</nobr></th>\r\n";
        echo "	</tr>\r\n";
        foreach($rssfarr as $rsrow){
            echo "	<tr >\r\n";
            foreach($fieldarray as $field){
                $result = $rsrow[$field];
                echo "		<td >$result</td>\r\n";
            }
            $struid = "shelf-".$rsrow["idsf"];
            echo "		<td ><span onclick=\"AjaxDbmOplib('$struid')\">进入</span></td>\r\n";
            echo "		<td ><span title='此功能暂未实现'>编辑</span></td>\r\n";
            echo "	</tr>\r\n";
        }
        echo "</table>\r\n";
        $sfsnum = count($rssfarr)+1;
    }else{
        echo "          书架表内为空！";
        $sfsnum = 1;
    }
        echo <<<THE
    <form action="" method="post" onsubmit="return chksfin(this)">
    <input type="text" name="stru" value="shelf" style="display:none"><input type="text" name="idfl" value="$idfl" style="display:none">
    序号：<input type="text" name="sfsnum" value="$sfsnum">名称: <input type="text" name="sfname">
    <input type="submit" name="insertdata" value="新建书架信息">
    </form> 
THE;
//----------------------------floor - shelf 列表--------end-------------------------------
break;
case "shelf":
$idsf = $id;
//----------------------------shelf - book 列表--------begin-------------------------------
$sql = "SELECT `sfname` FROM $db.shelf where idsf =$idsf ";
$sfname = $conne->getRowsRst($sql)["sfname"];
echo "<div id=\"dbm-CtLoc\"><span onclick=\"AjaxDbmOplib('floor-0')\">书架列表</span>-><span onclick=\"AjaxDbmOplib('$struid')\">$sfname</span></div>";
    $sql = "SELECT `idbk`, `ctime`, `bkname`, `bksnum` FROM $db.book where idsf =$idsf ORDER BY bksnum";
    $rsbkarr = $conne->getRowsArray($sql);
    if(count($rsbkarr)){
        $fieldarray =array('bksnum','ctime','bkname','idbk');
        $tharray =array('序号',"创建时间","书籍名称",'标志号');
        //rstodisplaytable($rs,$fieldarray,$tharray);
        echo "\r\n<table width=600px border=\"1px\">\r\n	<tr>\r\n";
        foreach($tharray as $th){
            echo "		<th><nobr>$th</nobr></th>\r\n";
        }
        echo "		<th ><nobr>操作</nobr></th>\r\n";
        echo "	</tr>\r\n";
        foreach($rsbkarr as $rsrow){
            echo "	<tr >\r\n";
            foreach($fieldarray as $field){
                $result = $rsrow[$field];
                echo "		<td >$result</td>\r\n";
            }
            $struid = "book-".$rsrow["idbk"];
            echo "		<td ><span title='此功能暂未实现'>编辑</span></td>\r\n";
            echo "	</tr>\r\n";
        }
        echo "</table>\r\n";
        $bksnum =count($rsbkarr)+1;
    }else{
        echo "          一本书都没有啊！";
        $bksnum =1;
    }
    echo <<<THE
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return chkbkin(this)">
    <input type="text" name="stru" value="book" style="display:none"><input type="text" name="idsf" value="$idsf" style="display:none">
    序号：<input type="text" name="bksnum" value="$bksnum">名称: <input type="text" name="bkname"><br>
    上传书籍图标：<input type="file" name="bkicon"><br>
    简介:<input type="text" name="bkintro" placeholder="少于200字" style="width:500px"><br>
    链接前缀:<input type="text" name="linkprefix" placeholder="XXX"><br>
    <input type="submit" name="insertdata" value="新建书籍信息">
    </form> 
THE;
//----------------------------shelf - book 列表--------end---------------------------------
break;
}

?>