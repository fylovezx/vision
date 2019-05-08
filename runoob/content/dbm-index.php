<?php
/**
 * 系统管理员主页
 * 利用js技术实现网站内容的切换
 *  
 * 
 */

if($_SESSION['pageinfo'][0]!='dbm-index'){
    $_SESSION['pageinfo'][0]='dbm-index';
    $_SESSION['pageinfo'][1]='opdb';
}
$dbmpage=$_SESSION['pageinfo'][1];

if(isset($_POST['insertsf'])){
    if(!isset($_SESSION['postdata']) || $_SESSION['postdata']!=$_POST){
            $connname = $_SESSION['userinfo']['connname'];
            include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
            $db=$conne->getconneinfo('dBase'); 
            $sfname = $_POST['sfname'];
            $sfsnum = $_POST['sfsnum'];
            $idfr =1;
            $mysqltime = $conne->getMysqlTIME();
            $username = $_SESSION['userinfo']['name'];
            $userid = $_SESSION['userinfo']['userid'];
            $sqlzlxh="UPDATE `$db`.`shelf` SET `sfsnum` = `sfsnum`+1 WHERE `sfsnum` >=$sfsnum and `idfr`=$idfr;";
            $sqlcrsf="INSERT INTO `$db`.`shelf` (`sfname`, `idfr`, `ctime`,`sfsnum`) VALUES ('$sfname', $idfr, '$mysqltime', $sfsnum );";
            $rsnum = array();
            $rsnum[] =$conne->uidRst($sqlzlxh);//这条语句应当是用来整理序号
            $rsnum[] =$conne->uidRst($sqlcrsf);
            $insertid = $conne->getinsertid();
            $sqlxrrz="INSERT INTO `$db`.`opliblog` (`mtime`, `userid`,`username`, `abs`) VALUES ('$mysqltime', ".
                        "$userid, '$username','在标识id为 $idfr 的楼层<br> 第$sfsnum 格新建名为 $sfname 书架,<br> 其标识id为$insertid');";
            $conne->uidRst($sqlxrrz);                
            $sqlzlxh=null;
            $sqlcrsf=null;
            $sqlxrrz=null;
        
            $conne->close_conn();
            $_SESSION['postdata']=$_POST;
    }else{
        echo "该提交数据与上次提交重复--对话框形式";
    }
}

?>
    
    <div >欢迎进入系统管理界面</div>
    <div id="dbm-menu">
        <span id="opdb"  onclick="AjaxDbmContent(this)">数据库管理</span>
        <span id="oplib"  onclick="AjaxDbmOplib('floor-0')">书库管理</span>
        <span id="opliblog" onclick="AjaxDbmContent(this)">书库管理日志</span>
    </div>
    <div id="dbm-content">

    </div>
<?php
//这里负责刷新回到原来位置
if($dbmpage=='oplib'){
    if($_SESSION['pageinfo'][2]!=''){
    $struid = $_SESSION['pageinfo'][2];
    echo <<<insertsf
    <script>
    AjaxDbmOplib('$struid');
    </script>
insertsf;
    }else{
        echo <<<insertsf
        <script>
        AjaxDbmOplib('floor-0');
        </script>
insertsf;
    }
}else{
    echo <<<insertsf
    <script>
    document.getElementById("$dbmpage").onclick();
    </script>
insertsf;
}
        ?>