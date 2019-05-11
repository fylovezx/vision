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
if(empty($dbmpage)){
    $dbmpage='opdb';
}
if(isset($_POST['insertdata'])){
    if(!isset($_SESSION['postdata']) || $_SESSION['postdata']!=$_POST){
        $_SESSION['postdata']=$_POST;
        include_once "content/dbm-insertdata.php";
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
    echo <<<insertdata
    <script>
    AjaxDbmOplib('$struid');
    </script>
insertdata;
    }else{
        echo <<<insertdata
        <script>
        AjaxDbmOplib('floor-0');
        </script>
insertdata;
    }
}else{
    echo <<<insertdata
    <script>
    document.getElementById("$dbmpage").onclick();
    </script>
insertdata;
}
        ?>