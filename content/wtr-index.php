<?php
/**
 * 书籍编辑主页
 * 主要负责跳转至 wtr-index-comp
 *  
 * 
 */
if($_SESSION['pageinfo']['wtr-index']==''){
    $_SESSION['pageinfo']['wtr-index']='all-0';
}
$wtrpage=$_SESSION['pageinfo']['wtr-index'];

if(isset($_POST['insertdata'])){
    if(!isset($_SESSION['postdata']) || $_SESSION['postdata']!=$_POST){
        $_SESSION['postdata']=$_POST;
        include_once "content/dbm-insertdata.php";
    }else{
        echo "<script>alert('wtr-index警告:该提交数据与上次提交重复');</script>";
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