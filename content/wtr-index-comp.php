<?php
session_start();
if(isset($_GET['struid'])){
$struid = $_GET['struid'];
}else{
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法访问wtr-index-comp.php！'); window.location.href='main-login.php';</script>";
}
$_SESSION['pageinfo']['wtr-index'] =$struid;//方便刷新回到这里
$struarray = explode("-",$struid);
$stru = $struarray[0];
$id = $struarray[1];
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
echo <<<style
<style>
#wtr-content span{
    color:blue;
    }
</style>
style;
switch ($stru)
{
case "all":
    //读取数据库中所有与本权限相关的书目
    $sql = "SELECT `idbk`, `ctime`, `bkname`, `bksnum` FROM $db.book ORDER BY idbk";
    $rs = $conne->getRowsArray($sql);
        if(count($rs)){
            $fieldarray =array('bksnum','ctime','bkname','idbk');
            $tharray =array('序号',"创建时间","书籍名称",'标志号');
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
                echo "		<td ><span  onclick=\"AjaxWtrComp('$struid')\">进入</span></td>\r\n";
                echo "	</tr>\r\n";
            }
            echo "</table>\r\n";
        }else{
            echo "          您权限内一本书可编辑的书都没有啊！";
        }
break;
case "book":
    $sql = "SELECT `bkname` FROM $db.book where idbk =$id ";
    $bkname = $conne->getRowsRst($sql)["bkname"];
    echo "<div id=\"wtr-CtLoc\"><span onclick=\"AjaxWtrComp('all-0')\">书籍列表</span>->";
    echo "<span onclick=\"AjaxDbmOplib('$struid')\">$bkname</span>->";
    echo "<span title=\"新增章\" onclick=\"AjaxWtrNew('book-$id')\">+</span></div>";

    $sql = "SELECT `idcp`, `cpname`, `cpsnum`, `idbk` , `link` FROM $db.chapter ORDER BY cpsnum";
    $rs = $conne->getRowsArray($sql);
    echo <<<wtrcompcbl
        <div id="wtr-comp-cbl" style="float:left">
wtrcompcbl;
        if(count($rs)){
            foreach($rs as $chapter){
                $cpname = $chapter["cpname"];
                $idcp = $chapter["idcp"];
                $link = $chapter["link"];
                echo "<div><span  onclick=\"AjaxWtrVis('$link')\">$cpname</span><span  title=\"新增节\" onclick=\"AjaxWtrNew('chapter-$idcp')\">+</span></div>\r\n";
            }
            echo "</div>";
            $_SESSION['ajax'] = array('wtr-comp-content', "link-".$rs[0]["link"]);
        }else{
            echo "</div>";
            $_SESSION['ajax'] = array('wtr-comp-content', "book-$id");
        }
        echo '<div id="wtr-comp-content">';
        include 'wtr-comp-content.php';
        echo '</div>';
break;
}


?>