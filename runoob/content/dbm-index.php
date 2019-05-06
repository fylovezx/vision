<?php
/**
 * 系统管理员主页
 * 利用js技术实现网站内容的切换
 *  
 * 
 */

if($_SESSION['pageinfo'][0]!='dbm-index'){
    $_SESSION['pageinfo']=array('dbm-index','opdb');
}
$dbmpage=$_SESSION['pageinfo'][1];

if(isset($_POST['insertsf'])){
    if($_SESSION['canpost']){
        $connname = $_SESSION['userinfo']['connname'];
        include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
        $db=$conne->getconneinfo('dBase'); 
        $sfname = $_POST['sfname'];
        $sfsnum = $_POST['sfsnum'];
        $idfr =1;
        $sqlzlxh="UPDATE `$db`.`shelf` SET `sfsnum` = `sfsnum`+1 WHERE `sfsnum` >=$sfsnum and `idfr`=$idfr;";
        $sqlcrsf="INSERT INTO `$db`.`shelf` (`sfname`, `idfr`, `sfsnum`) VALUES ('$sfname', $idfr, $sfsnum);";
        $rsnum = array();
    
        $rsnum[] =$conne->uidRst($sqlzlxh);//这条语句应当是用来整理序号
        $rsnum[] =$conne->uidRst($sqlcrsf);
        $insertid = $conne->getinsertid();
        $username = $_SESSION['userinfo']['name'];
        $userid = $_SESSION['userinfo']['userid'];
        $sqlxrrz="INSERT INTO `$db`.`syslog` (`mtime`, `userid`,`username`, `abs`) VALUES (Now(), ".
                    "$userid, '$username','在标识id为 $idfr 的楼层<br> 第$sfsnum 格新建名为 $sfname 书架,<br> 其标识id为$insertid');";
        $conne->uidRst($sqlxrrz);                
        $sqlzlxh=null;
        $sqlcrsf=null;
        $sqlxrrz=null;
    
        $conne->close_conn();
        $_SESSION['canpost'] =false;
    }else{
        $_SESSION['canpost'] =true;
    }


}

?>
    
    <div >欢迎进入系统管理界面</div>
    <div id="dbm-menu">
        <span id="opdb"  onclick="changepage(this)">管理数据库</span>
        <span id="addsf"  onclick="changepage(this)">添加书架</span>
        <span id="addbk" onclick="changepage(this)">添加书目</span>
        <span id="syslog" onclick="changepage(this)">操作日志</span>
    </div>
    <div id="dbm-content">

    </div>
<?php
        echo <<<insertsf
        <script>
        document.getElementById("$dbmpage").onclick();
        </script>
insertsf;
        ?>