<?php
session_start();

/* 
session 需要存储。
userinfo    用户信息：姓名、id、权限（id）、访问session(id)
pageinfo    页面信息：上一个页面，当前页面
tempdata    临时数据：存储一些临时用的数据，用后即消
*/

/*
系统行为路线图
  1.首先判断用户信息
    DBM	超级管理员 FLM 楼层管理员 SFM 书架管理员 WTR 书本作者
    CTR 资料贡献者 STD 已注册用户 VIS 未注册游客
*/
if(!isset($_SESSION['userinfo']))
{
    $_SESSION['userinfo']=array(
        "name" =>'fy',
        "userid" =>1,
        "qx"   =>1,
        "login" =>true,
        "connname" =>'vsrbdbm',
    );
}

//获取当前地址。方便刷新回来
if(!isset($_SESSION['pageinfo'])){
    $_SESSION['pageinfo']=array('dbm-index','opdb');
}

if(!isset($_SESSION['canpost'])){
    $_SESSION['canpost']=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学习小站</title>
    <link type="text/css" rel="stylesheet"  href="css/main-index.css" />
    <link type="text/css" rel="stylesheet"  href="css/dbm-index.css" />
    <script src="js/dbm-index.js"></script>
</head>
<body>
<div class="main-div-head" >
    <div style="float:left">学习小站</div>
    <div style="float:right"><input type="text" name="main-searchtext" id="" value="搜索框"></div>
</div>
<div class="main-div-nav">
    <?php 
        include_once "content/main-navmenu.php";
    ?>
</div>

<div >
    <?php 
        $ctpage=$_SESSION['pageinfo'][0];

        include "content/$ctpage.php";
        
    ?>
</div>

<footer>
<div >
    <?php    
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/advergers.php'; givemewords($advergerswords,"Tony");
    ?>    
</div>
</footer>
</body>
</html>