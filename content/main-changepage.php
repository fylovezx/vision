<?php
session_start();								//初始化SESSION变量
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法访问！'); window.location.href='main_login.php';</script>";
}

switch ($page){
    case "index":
    $_SESSION['pageinfo'][0]='main-visit';//这里后面要根据权限修改为主页
    echo "<script>window.location.href='../index.php';</script>";
    break;
    case "dbm-index":
    $_SESSION['pageinfo'][0]='dbm-index';//这里后面要根据权限修改为主页
    echo "<script>window.location.href='../index.php';</script>";
    break;

}

?>