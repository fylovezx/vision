
<span id="mian-navmenu-index"  >首页</span> 
<span id="mian-navmenu-nomind"  >Nomind</span> 
<?php

if($_SESSION['userinfo']['login']){
    echo '<span id="mian-navmenu-grzx" >个人中心</span>'."\r\n";
    echo '<span id="mian-navmenu-msg" >消息(<font color="red">99</font>)</span>'."\r\n";
    echo '<span id="mian-navmenu-exit" >退出</span>'."\r\n";
}else{
    echo '<span id="mian-navmenu-regist" >注册</span>'."\r\n";
    echo '<span id="mian-navmenu-login" >登陆</span>'."\r\n";
}
?>