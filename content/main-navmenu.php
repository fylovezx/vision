
<span id="mian-navmenu-index"  ><a href="content/main-changepage.php?page=main-visit">首页</a></span> 

<?php

if($_SESSION['userinfo']['login']){
    $uname = $_SESSION['userinfo']['uname'];
    echo '<span id="mian-navmenu-dbm"  ><a href="content/main-changepage.php?page=dbm-index">后台管理</a></span> '."\r\n";
    echo '<span id="mian-navmenu-wtr"  ><a href="content/main-changepage.php?page=wtr-index">编写书籍</a></span> '."\r\n";
    echo '<span id="mian-navmenu-grzx" >'.$uname.'中心</span>'."\r\n";
    echo '<span id="mian-navmenu-msg" >消息(<font color="red">99</font>)</span>'."\r\n";
    echo '<span id="mian-navmenu-exit" ><a href="content/main-login.php">退出</a></span>'."\r\n";
}else{
    echo '<span id="mian-navmenu-nomind"  >Nomind</span> ';
    echo '<span id="mian-navmenu-regist" >注册</span>'."\r\n";
    echo '<span id="mian-navmenu-login" onclick="document.getElementById(\'main-div-login\').style.display=\'block\'" >登陆</span>'."\r\n";?>
    <div id="main-div-login" class="modal">          
    <form class="modal-content animate" action="content/main-login.php" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('main-div-login').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container">
            用户名: <input type="text" placeholder="Enter Username" name="uname" required>
            密码: <input type="password" placeholder="Enter Password" name="pwd">
            <input type="submit" name="sublogin" value="提交">
            </form>
            </div>
          </form>
        </div>
<?php
}
?>