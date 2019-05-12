<div id="main-visit-cbl" style="float:left">

<?php
    $_SESSION['pageinfo']['CtLoc']='main-visit';
//-------章节 -------
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
$sql = "SELECT * FROM $db.shelf ORDER BY idfl,sfsnum ";
$rs = $conne->getRowsArray($sql);
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
getcmnt(array("wong","content","main-visit"),$rs);
echo "<div>1楼书架列表</div>\r\n";
foreach($rs as $section){
        echo "<div>".$section["sfname"]."</div>\r\n";
}

echo <<<maintext
</div>    
<div id="maintext" style="float:left">
maintext;

$sql = "SELECT * FROM wong.book ORDER BY idsf,idbk";
$rs2 = $conne->getRowsArray($sql);
getcmnt(array("wong","content","main-visit"),$rs2);

/* 
这里需要整理一下，
从shelf中读取的数据是按照snum也就是序号排列的，
我们--book-- 中的数据需要根据--shelf--中--snum-- 的所对应的--id--顺序来读取
换个意思：
首先对--shelf--按照--snum--排序，获取--idshelf--的数组
然后--book--按照--idshelf--的顺序和--booksnum--排序
*/
//1.对--shelf--按照--snum--排序,从数据库中读取出来已经排好了
//2.循环--idshelf--数组，在rs2中寻找对应--shelf--提取出来
$dispalyrs2=array();
$dispalysnum = array();
$dispalyrow = array();
foreach($rs as $section){
    echo "<h2>".$section["sfname"]."</h2>\r\n<hr>";
    foreach($rs2 as $learnbook){
        if($learnbook["idsf"]==$section["idsf"]){
            $dispalyrs2[] = $learnbook;
        }
        //将得出的$dispalyrs2 按照snum排序
        $j=1;
        getcmnt(array("wong","content","main-visit"),$dispalyrs2);
        for($i=0;$i<count($dispalyrs2);$i++){
            $link = $dispalyrs2[0]["link"];
            $diricon = $dispalyrs2[0]["bkicon"];
            $intro = $dispalyrs2[0]["bkintro"];
            $name = $dispalyrs2[0]["bkname"];
            if($j<3){
echo <<<learning
            <a  href="index.php?fn=$link"><h4>【 $name 】</h4>
            <img height="36" width="36" src="data/pic/icon/$diricon">
            <strong>$intro</strong></a>
learning;
            $j++;
            }else{
echo <<<learning
                <a  href="index.php?fn=$link"><h4>【$name】</h4>
                <img height="36" width="36" src="data/$diricon">
                <strong>$intro</strong></a><br>
learning;
            $j=1;
            }
        }
        $dispalyrs2=array();
        $dispalysnum = array();
        $dispalyrow = array();
    }
}
echo "</div>  \r\n";
?>