<?php
@session_start();

if(isset($_SESSION['ajax']) ){
    echo "session访问，include注意地址的问题<br>";
    if($_SESSION['ajax'][0]=='wtr-comp-content'){
        $struid = $_SESSION['ajax'][1];
        unset($_SESSION['ajax']);
    }else{
        unset($_SESSION['ajax']);
        echo "<script>alert('非法session访问wtr-comp-content.php！'); window.location.href='main_login.php';</script>";
    }
    
}else{
    echo "get访问<br>";
    if(isset($_GET['struid'])){
        $struid = $_GET['struid'];
    }else{
        //这种情况属于非法进入，应当直接予以退出处理
        echo "<script>alert('非法get访问wtr-index-comp.php！'); window.location.href='main_login.php';</script>";
    }
}
$struarray = explode("-",$struid);
$stru = $struarray[0];
$id = $struarray[1];
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
switch ($stru)
{
case "book":
    /* 代表是要在本书之中插入章节
    给一个章列表，是插入章还是插入节 
    这里插入章，节在各章之中体现
    */
    echo <<<THE
    <form action="" method="post">
    <input type="text" name="stru" value="chapter" style="display:none"><input type="text" name="idbk" value="$id" style="display:none">
    第<input type="text" name="cpsnum" >章 名称: <input type="text" name="cpname"><br>
    分配指向链接:<input type="text" name="link" placeholder="html-firstcp">
    <input type="submit" name="insertdata" value="新建章信息">
    </form> 
THE;


break;
}
?>