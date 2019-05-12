<?php
/**
 * 书籍编辑主页
 * 
 *  
 * 
 */

$wtrpage=$_SESSION['pageinfo']['wtr-index'];
if($_SESSION['pageinfo']['wtr-index']==''){
    $_SESSION['pageinfo']['wtr-index']='all-0';
}
$wtrpage=$_SESSION['pageinfo']['wtr-index'];

if(isset($_POST['insertdata'])){
    if(!isset($_SESSION['postdata']) || $_SESSION['postdata']!=$_POST){
        $_SESSION['postdata']=$_POST;
        include_once "content/dbm-insertdata.php";
    }else{
        echo "该提交数据与上次提交重复--对话框形式";
    }
}


echo <<<content
<div id="wtr-content">

</div>
<script>
AjaxWtrComp('$wtrpage');
</script>
content;
?>