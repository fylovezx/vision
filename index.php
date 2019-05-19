<?php
session_start();

/* 
session 需要存储。
userinfo    用户信息：姓名、id、权限（id）、访问session(id)
pageinfo    页面信息：上一个页面，当前页面
    CtLoc 当前位置

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
        "name" =>'',
        "userid" =>0,
        "qx"   =>0,
        "login" =>false,
        "connname" =>'wongvis',
    );
    $_SESSION['pageinfo']['CtLoc']='main-visit';//这里后面要根据权限修改为主页
    $_SESSION['pageinfo']['main-visit'] ='floor-1';
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
    <link type="text/css" rel="stylesheet"  href="css/main-login.css" />
    <link type="text/css" rel="stylesheet"  href="css/dbm-index.css" />
    <link type="text/css" rel="stylesheet"  href="css/wtr-index.css" />
    <script src="js/index.js"></script>
    <script src="js/dbm-index.js"></script>
    <script src="js/wtr-index.js"></script>
    <script src="js/vis-index.js"></script>
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
    <div id = "main-content" style="float:left">
        <?php 
    /*     
        ajax优点：
            可以不用重新载入index页面
                但是功能上的切换还是需要重新载入好一点
                这里需要设置一个中转的页面用于调度
        include:
            可以使用js文件
            这里用include就没有办法通过main-div-nav进行跳转
            include也可用通过span内的<a>标签进行切换，不过需要一个页面中转
    */
            $ctpage=$_SESSION['pageinfo']['CtLoc'];
            include "content/$ctpage.php";
        ?>
    </div>
    <?php 
    if($_SESSION['userinfo']['userid']==0){

    }else{
        echo <<<hispage
        <div style="float:left">
        <span style="color:dodgerblue" onclick="AjaxRefHist()">历史记录(点击刷新)</span>
        <div id = "main-hispage"></div>
    </div>
    <script>
    AjaxRefHist();
    </script>
hispage;
    }
?>
</div>
<div style="clear:both;">
    <?php  
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/advergers.php'; givemewords($advergerswords,"Tony");
    ?>    
</div>

</body>
</html>