<?php
session_start();								//初始化SESSION变量
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法访问main-changepage！'); window.location.href='main-login.php';</script>";
}

if(isset($_GET['in'])){
    //这是为了通过历史记录直接进入
    $in = $_GET['in'];
}else{
    
}
//其实也可以通过ajax访问主页
switch ($page){
    case "main-visit":
    $_SESSION['pageinfo']['CtLoc']='main-visit';//这里后面要根据权限修改为主页
    if(!isset($_SESSION['pageinfo']['main-visit'])){
        $_SESSION['pageinfo']['main-visit']='floor-1';//不能删，否则无法通过main-div-nav切换
    }
    break;
    case "dbm-index":
        $_SESSION['pageinfo']['CtLoc']='dbm-index';
        if(!isset($_SESSION['pageinfo']['dbm-index'])){
            $_SESSION['pageinfo']['dbm-index']='opdb';//不能删，否则无法通过main-div-nav切换
        }
    break;
    case "wtr-index":
        $_SESSION['pageinfo']['CtLoc']='wtr-index';
        if(!isset($_SESSION['pageinfo']['wtr-index'])){
            $_SESSION['pageinfo']['wtr-index']='all-0';//不能删，否则无法通过main-div-nav切换
        }   
    break;
}
if(isset($in)){
    $_SESSION['pageinfo'][$page]=$in;
}
echo "<script>window.location.href='../index.php';</script>";
?>