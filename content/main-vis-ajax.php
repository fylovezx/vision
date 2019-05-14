
<?php
session_start();
if(isset($_GET['struid'])){
    $_SESSION['pageinfo']['main-visit'] = $_GET['struid'];//由于有通过ajax方法过来，所以不能删
    $struid = $_GET['struid'];
}else{
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法main-vis-ajax访问！'); window.location.href='main-login.php';</script>";

}

echo '<div id="main-visit-cbl" style="float:left">';

$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 

$struarray = explode("-",$struid);
$stru = $struarray[0];
$id = $struarray[1];

switch ($stru){
    case "all":
        //---------all--------侧边栏-------读取书架目录 -------begin-----------------
        $sql = "SELECT idsf,sfname FROM $db.shelf ORDER BY idfl,sfsnum ";
        $rs = $conne->getRowsArray($sql);
        include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
        getcmnt(array("wong","content","main-visit"),$rs);
        echo "<div >1楼书架列表</div>\r\n";
        foreach($rs as $section){
                echo "<div>".$section["sfname"]."</div>\r\n";
        }
        //----------all-------侧边栏-------读取书架目录 -------end-----------------
        echo '</div><div id="maintext" style="float:left">';

        //-----------all------正文栏-------读取所有书架中书本icon、intro、name等基本信息 -------begin-----------------
        $sql = "SELECT idsf,idbk,bkname,bkicon,bkintro FROM wong.book ORDER BY idsf,idbk";
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
                    $diricon = $dispalyrs2[0]["bkicon"];
                    $intro = $dispalyrs2[0]["bkintro"];
                    $name = $dispalyrs2[0]["bkname"];
                    $idbk = $dispalyrs2[0]["idbk"];
                    if($j<3){
        echo <<<learning
                    <span onclick="AjaxVis('book-$idbk')"><h4>【 $name 】</h4>
                    <img height="36" width="36" src="data/pic/icon/$diricon">
                    <strong>$intro</strong></span>
learning;
                    $j++;
                    }else{
        echo <<<learning
                        <span onclick="AjaxVis('book-$idbk')"><h4>【 $name 】</h4>
                        <img height="36" width="36" src="data/$diricon">
                        <strong>$intro</strong></span><br>
learning;
                    $j=1;
                    }
                }
                $dispalyrs2=array();
                $dispalysnum = array();
                $dispalyrow = array();
            }
        }
        //--------all---------正文栏-------读取所有书架中书本icon、intro、name等基本信息 -------end-----------------
        echo "</div>  \r\n";
    break;
    case "book":
        //-------book----------侧边栏-------读取章节目录 -------begin-----------------
        $idbk = $id;
        $bkname = $conne->getFields("SELECT bkname FROM $db.book WHERE idbk=$idbk",'bkname');
        if(!empty($bkname)){
            echo "<div>$bkname 目录</div>\r\n";
        }else{
            echo "<div>标识为$idbk 的书不存在</div>\r\n";
        }
        $rs = $conne->getRowsArray("SELECT idcp,cpname FROM $db.chapter WHERE idbk = $idbk ORDER BY cpsnum ");
        include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
        getcmnt(array("wong","content","main-visit"),$rs);
        echo "<div><span onclick=\"AjaxVis('book-$idbk')\">前言</span></div>\r\n";
        foreach($rs as $chapter){
            $idcp2 = $chapter['idcp'];
            $cpname =$chapter['cpname'];
            echo "<div><span onclick=\"AjaxVis('chapter-$idcp2')\">$cpname</div>\r\n";
        }
        //--------book---------侧边栏-------读取章节目录 -------end-----------------
        //--------book---------正文栏-------读取书本前言 -------begin-----------------
        echo '</div><div id="maintext" style="float:left">';
        $rs= $conne->getRowsRst("SELECT link FROM $db.book WHERE idbk = $idbk");
        $link = $rs['link'];
        $rs2= $conne->getRowsRst("SELECT htmlpage FROM $db.htmlpage WHERE link='$link'");
        //$rsstr1 = $rs["code"];
        $rs2str = $rs2["htmlpage"];
        $find = array("<",">","\\\"");
        $replace = array("&lt","&gt","&quot;");
        $code =str_replace($replace,$find,$rs2str);
        echo $code;
        echo "</div>  \r\n";
        //--------book---------正文栏-------读取书本前言 -------end-----------------
    break;
    case "chapter":
        //-------chapter----------侧边栏-------读取章节目录 -------begin-----------------
        $idcp = $id;
        $rsbk = $conne->getRowsRst("SELECT idbk from $db.chapter where idcp=$idcp");
        $idbk = $rsbk['idbk'];
        $bkname = $conne->getFields("SELECT bkname FROM $db.book WHERE idbk=$idbk",'bkname');
        if(!empty($bkname)){
            echo "<div>$bkname 目录</div>\r\n";
        }else{
            echo "<div>标识为$idbk 的书不存在</div>\r\n";
        }
        $rs = $conne->getRowsArray("SELECT idcp,cpname FROM $db.chapter WHERE idbk = $idbk ORDER BY cpsnum ");
        include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
        getcmnt(array("wong","content","main-visit"),$rs);
        echo "<div><span onclick=\"AjaxVis('book-$idbk')\">前言</span></div>\r\n";
        foreach($rs as $chapter){
            $idcp2 = $chapter['idcp'];
            $cpname =$chapter['cpname'];
            echo "<div><span onclick=\"AjaxVis('chapter-$idcp2')\">$cpname</div>\r\n";
        }
        //--------chapter---------侧边栏-------读取章节目录 -------end-----------------
        //--------chapter---------正文栏-------读取章信息 -------begin-----------------
        echo '</div><div id="maintext" style="float:left">';
        $rs= $conne->getRowsRst("SELECT link FROM $db.chapter WHERE idcp = $idcp");
        $link = $rs['link'];
        $rs2= $conne->getRowsRst("SELECT htmlpage FROM $db.htmlpage WHERE link='$link'");
        //$rsstr1 = $rs["code"];
        $rs2str = $rs2["htmlpage"];
        $find = array("<",">","\\\"");
        $replace = array("&lt","&gt","&quot;");
        $code =str_replace($replace,$find,$rs2str);
        echo $code;  
        echo "</div>  \r\n";
        //--------chapter---------正文栏-------读取章信息 -------end-----------------
break;
}

?>