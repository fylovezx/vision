<?php
/**
 * 主页
 * 利用js技术实现网站内容的切换
 *  暂时不做
 * 直接从index.json中导入首页数据
 * 
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';

echo <<<hotmenu
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学习小站</title>
    <link type="text/css" rel="styleSheet"  href="css/index.css" />
</head>
<body>
<div id="head">
    <div style="float:left">学习小站</div>
    <div style="float:right">搜索。。。。</div>
</div><br>

<div id="hotmenu">
<a href="index.php">首页</a>
<a href="index.php?fn=HTML-tutorial">HTML</a>
<a href="index.php?fn=PHP-tutorial">PHP</a>
<a href="index.php?fn=Apache-tutorial">Apache</a>
<a href="index.php?fn=Mysql-tutorial">Mysql</a>
<a href="index.php?fn=Git-tutorial">Git</a>
<a href="index.php?fn=VSCode-tutorial">VSCode</a>
</div>
<div>
<div id="section" style="float:left">
hotmenu;

//-------章节 -------
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne);
$sql = "SELECT * FROM runoob.cj1 ORDER BY snum ";
$rs = $conne->getRowsArray($sql);
getcmnt(array("runoob","index"),$rs);
foreach($rs as $section){
        echo "<div>".$section["name"]."</div>\r\n";
    }

echo <<<maintext
</div>    
<div id="maintext" style="float:left">
maintext;

$sql = "SELECT * FROM runoob.cj2 ";
$rs2 = $conne->getRowsArray($sql);
getcmnt(array("runoob","index"),$rs2);

// ------------------把之前的rs2结果进行排序-----begin--------------
    foreach ($rs2 as $key => $row) {
        $cj1[$key]  = $row['cj1'];
        $snum[$key] = $row['snum'];
    }

    // 将数据根据 volume 降序排列，根据 edition 升序排列
    // 把 $data 作为最后一个参数，以通用键排序
    array_multisort($cj1, SORT_ASC, $snum, SORT_ASC, $rs2);
// ------------------把之前的rs2结果进行排序-----end--------------
getcmnt(array("runoob","index"),$rs2);

/* 
这里需要整理一下，
从cj1中读取的数据是按照snum也就是序号排列的，
我们--cj2-- 中的数据需要根据--cj1--中--snum-- 的所对应的--id--顺序来读取
换个意思：
首先对--cj1--按照--snum--排序，获取--idcj1--的数组
然后--cj2--按照--idcj1--的顺序和--cj2snum--排序
*/
//1.对--cj1--按照--snum--排序,从数据库中读取出来已经排好了
//2.循环--idcj1--数组，在rs2中寻找对应--cj1--提取出来
$dispalyrs2=array();
$dispalysnum = array();
$dispalyrow = array();
foreach($rs as $section){
    echo "<h2>".$section["name"]."</h2>\r\n<hr>";
    foreach($rs2 as $learncj2){
        if($learncj2["cj1"]==$section["idcj1"]){
            $dispalyrs2[] = $learncj2;
        }
        //将得出的$dispalyrs2 按照snum排序
        foreach ($dispalyrs2 as $key => $dispalyrow) {
            $dispalysnum[$key] = $dispalyrow['snum'];
        }
        array_multisort($dispalysnum, SORT_ASC, $dispalyrs2);
        $j=1;
        getcmnt(array("runoob","index"),$dispalyrs2);
        for($i=0;$i<count($dispalyrs2);$i++){
            $link = $dispalyrs2[0]["link"];
            $diricon = $dispalyrs2[0]["icon"];
            $intro = $dispalyrs2[0]["intro"];
            $name = $dispalyrs2[0]["name"];
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

?>

<footer>
<div id="footer">
    <?php    
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/advergers.php'; givemewords($advergerswords,"Tony");
    ?>    
</div>
</footer>
</body>
</html>