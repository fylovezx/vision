
<?php
session_start();
/**
 * book chapter section中重复太多需要修改
 * stru 有四种可能性：
 *  floor单独处理 
 *  book chapter section 三个合并处理，只要通过他们的属性
 *      获取idbk就可以统一获取书籍列表
 * 注意floor中的主内容div叫maintext
 *          其余的里面叫main-content-text
 * 
 */
if(isset($_GET['struid'])){
    $_SESSION['pageinfo']['main-visit'] = $_GET['struid'];//由于有通过ajax方法过来，所以不能删
    $struid = $_GET['struid'];
}else{
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法main-vis-ajax访问！'); window.location.href='main-login.php';</script>";

}
echo <<<style
<style>
#main-visit-cbl span{
    color:blue;
    cursor:pointer;
}
#maintext span{
        cursor:pointer;
        height:100px;
        width:300px;
        display:block;
        float:left;
        background-color:#f6f6f6;
        margin:0px 20px 5px 0px;
        border-radius:10px;
        padding:0px 0px 0px 5px;
}
#maintext h2{
    clear:both;
}

</style>
style;
echo '<div id="main-visit-cbl" style="float:left">';

$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 

$struarray = explode("-",$struid);
$stru = $struarray[0];
$id = $struarray[1];

if($stru=="floor"){
    //---------all--------侧边栏-------读取书架目录 -------begin-----------------
    $idfl =$id;
    $sql = "SELECT idsf,sfname FROM $db.shelf WHERE idfl=$idfl  ORDER BY idfl,sfsnum ";
    $rssf = $conne->getRowsArray($sql);
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
    getcmnt(array("wong","content","main-visit"),$rssf);
    
    echo "<div >$idfl 楼书架列表</div>\r\n";
    foreach($rssf as $shelf){
            echo "<div>".$shelf["sfname"]."</div>\r\n";
    }
    //----------all-------侧边栏-------读取书架目录 -------end-----------------
    echo '</div><div id="maintext" style="float:left">';

    //-----------all------正文栏-------读取所有书架中书本icon、intro、name等基本信息 -------begin-----------------
    $sql = "SELECT idsf,idbk,bkname,bkicon,bkintro FROM wong.book ORDER BY idsf,bksnum";
    $rsbk = $conne->getRowsArray($sql);
    getcmnt(array("wong","content","main-visit"),$rsbk);

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
    $dispalyrsbk=array();
    $dispalysnum = array();
    $dispalyrow = array();
    foreach($rssf as $shelf){
        echo "<h2 >".$shelf["sfname"]."</h2>\r\n<hr>";
        foreach($rsbk as $learnbook){
            if($learnbook["idsf"]==$shelf["idsf"]){
                $dispalyrsbk[] = $learnbook;
            }
            //将得出的$dispalyrsbk 按照snum排序,在查询出来得时候已经排号序了
            $j=1;
            getcmnt(array("wong","content","main-visit"),$dispalyrsbk);
            for($i=0;$i<count($dispalyrsbk);$i++){
                $diricon = $dispalyrsbk[0]["bkicon"];
                $intro = $dispalyrsbk[0]["bkintro"];
                $name = $dispalyrsbk[0]["bkname"];
                $idbk = $dispalyrsbk[0]["idbk"];
                if($j<3){
    echo <<<learning
                <span onclick="AjaxVis('book-$idbk')"><strong style="font-size:20px">【 $name 】</strong><br>
                <img height="50" width="50" src="data/pic/icon/$diricon" style="float:left">
                <div style="float:right;width:240px;"><strong >$intro</strong></div></span>
learning;
                $j++;
                }else{
    echo <<<learning
                <span onclick="AjaxVis('book-$idbk')"><strong style="font-size:20px">【 $name 】</strong><br>
                <img height="50" width="50" src="data/$diricon" style="float:left">
                <div style="float:right;width:240px;"><strong >$intro</strong></div></span><br>
learning;
                $j=1;
                }
            }
            $dispalyrsbk=array();
            $dispalysnum = array();
            $dispalyrow = array();
        }
    }
    //--------all---------正文栏-------读取所有书架中书本icon、intro、name等基本信息 -------end-----------------
    echo "</div>  \r\n";
}else{
    //得到$id求得$bkid然后同意获取书本的章节信息
    switch ($stru){
        case "book":
            $idbkLoc = $id;
            $rsbk= $conne->getRowsRst("SELECT link FROM $db.book WHERE idbk = $idbkLoc");
            $linkLoc = $rsbk['link'];
        break;
        case "chapter":
            $idcpLoc = $id;
            $rscp = $conne->getRowsRst("SELECT cpname,idbk,link from $db.chapter where idcp=$idcpLoc");
            $idbkLoc = $rscp['idbk'];
            $cpnameLoc = $rscp['cpname'];
            $linkLoc = $rscp['link'];
        break;
        case "section":
            $idscLoc = $id;
            $rssc = $conne->getRowsRst("SELECT scname,idcp,link from $db.section where idsc=$idscLoc");
            $idcpLoc = $rssc['idcp'];
            $linkLoc = $rssc['link'];
            $scnameLoc = $rssc['scname'];
            $rscp = $conne->getRowsRst("SELECT cpname,idbk from $db.chapter where idcp=$idcpLoc");
            $idbkLoc = $rscp['idbk'];  
            $cpnameLoc = $rscp['cpname'];          
        break;
    }
                //-------book----------侧边栏-------读取章节目录 -------begin-----------------
                $bkname = $conne->getFields("SELECT bkname FROM $db.book WHERE idbk=$idbkLoc",'bkname');
                if(!empty($bkname)){
                    echo "<div>$bkname 目录</div>\r\n";
                    $rscp = $conne->getRowsArray("SELECT idcp,cpname,cpsnum FROM $db.chapter WHERE idbk = $idbkLoc ORDER BY cpsnum ");
                    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/debug.php';
                    getcmnt(array("wong","content","main-visit"),$rscp);
                    echo "<div><span onclick=\"AjaxVis('book-$idbkLoc')\">前言</span></div>\r\n";
                    foreach($rscp as $chapter){
                        $cpname =$chapter['cpname'];
                        $idcp = $chapter['idcp'];
                        
                        $cpsnum = $chapter["cpsnum"];
                        echo "<div><span onclick=\"AjaxVis('chapter-$idcp')\">$cpsnum-$cpname</span>";
                        //写入节信息
                        $sqlsc = "SELECT `idsc`,`scname`, `scsnum` , `link` FROM $db.section WHERE idcp=$idcp ORDER BY scsnum";
                        $rssc = $conne->getRowsArray($sqlsc);
                        foreach($rssc as $section){
                            $scname =$section['scname'];
                            $scsnum =$section['scsnum'];
                            $linksc =$section['link'];
                            $idsc =$section['idsc'];
                            echo "<br><span onclick=\"AjaxVis('section-$idsc')\" >$cpsnum.$scsnum-$scname</span>\r\n";
                        }
                        echo "</div>\r\n";
                    }
                }else{
                    echo "<div>标识为$idbk 的书不存在</div>\r\n";
                }                
                //--------book---------侧边栏-------读取章节目录 -------end-----------------
                //--------book---------正文栏-------读取当前link对应的页 -------begin-----------------
                echo '</div><div id="main-content-text" style="float:left;background-color:#e7e7e7;width:700px;" >';
                $rslink= $conne->getRowsRst("SELECT htmlpage FROM $db.htmlpage WHERE link='$linkLoc'");
                $rslinkstr = $rslink["htmlpage"];
                $find = array("<",">","\\\"");
                $replace = array("&lt","&gt","&quot;");
                $code =str_replace($replace,$find,$rslinkstr);
                echo $code;
                echo "</div>  \r\n";
                //--------book---------正文栏-------读取当前link对应的页 -------end-----------------
    //写入历史记录--begin--
    switch ($stru){
        case "book":
            $_SESSION['include'] = "浏览:$bkname 前言";
        break;
        case "chapter":
            $_SESSION['include'] = "浏览:$bkname-$cpnameLoc";
        break;
        case "section":
            $_SESSION['include'] = "浏览:$bkname-$cpnameLoc-$scnameLoc";
        break;
    }
    include_once "main-hispage-update.php";
    //写入历史记录--end--           
                
                
                

}



?>