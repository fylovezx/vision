<?php
session_start();
/**
 * 仅能通过wtr-index.js中ajax的AjaxWtrComp方法引入
 *      故而肯定有$_GET['struid']的值
 * 由于是通过ajax方法调用的，js无法运行，
 *      所以无法调用js中AjaxWtrVis方法获取wtr-comp-content的值，
 *      退而求次通过赋予$_SESSION['ajax']参数，在wtr-comp-content运行的过程中代替$_GET的值
 */
if(isset($_GET['struid'])){
$struid = $_GET['struid'];
}else{
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法访问wtr-index-comp.php！'); window.location.href='main-login.php';</script>";
}
$_SESSION['pageinfo']['wtr-index'] =$struid;//Ajax引入的所以需要赋值，方便刷新回到这里
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
    $idbk = $id;
    $sql = "SELECT `bkname`,`link` FROM $db.book where idbk =$idbk ";
    
    $rsbk = $conne->getRowsRst($sql);
    $bkname = $rsbk['bkname'];
    $link = $rsbk['link'];
    echo "<div id=\"wtr-CtLoc\"><span onclick=\"AjaxWtrComp('all-0')\">书籍列表</span>->$bkname->";
    echo "<span title=\"新增章\" onclick=\"AjaxWtrNew('book-$id')\">+</span></div>";

    $sql = "SELECT `idcp`, `cpname`, `cpsnum` , `link` FROM $db.chapter WHERE idbk=$idbk ORDER BY cpsnum";
    $rs = $conne->getRowsArray($sql);
    echo <<<wtrcompcbl
        <div id="wtr-comp-cbl" style="float:left">
        <div><span  onclick="AjaxWtrVis('$link')">前言</span></div>\r\n
wtrcompcbl;
        $_SESSION['ajax'] = array('wtr-comp-content', "link-".$link);
        if(count($rs)){
            foreach($rs as $chapter){
                $cpname = $chapter["cpname"];
                $idcp = $chapter["idcp"];
                $link = $chapter["link"];
                echo "<div><span  onclick=\"AjaxWtrVis('$link')\">$cpname</span><span  title=\"新增节\" onclick=\"AjaxWtrNew('chapter-$idcp')\">+</span></div>\r\n";
            }
            echo "</div>";
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