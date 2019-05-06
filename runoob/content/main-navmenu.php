
<span id="mian-navmenu-index"  onclick="changepage(this)">首页</span> 
<span id="mian-navmenu-nomind"  onclick="changepage(this)">Nomind</span> 
<?php

if($_SESSION['userinfo']['login']){
    echo '<span id="mian-navmenu-grzx" onclick="changepage(this)">个人中心</span>'."\r\n";
    echo '<span id="mian-navmenu-msg" onclick="changepage(this)">消息(<font color="red">99</font>)</span>'."\r\n";
    echo '<span id="mian-navmenu-exit" onclick="changepage(this)">退出</span>'."\r\n";
}else{
    echo '<span id="mian-navmenu-regist" onclick="changepage(this)">注册</span>'."\r\n";
    echo '<span id="mian-navmenu-login" onclick="changepage(this)">登陆</span>'."\r\n";
}
?>