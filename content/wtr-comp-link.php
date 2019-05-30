<?php 
session_start();
/**
 * 显示数据库中指定htmlpage 的代码的效果，
 * 1.防止误入的措施
 *  暂未做
 * 2.运行流程
 *  根据$_GET["link"]从mysql数据库中读取对应的html代码，
 *  显示在左侧代码展示区textarea中，并运行显示在右侧的代码显示区
 * 
 * 3.控件功能
 *  控件        命名        文本        事件/功能                   说明
 *  btn         None        源代码      onclick="resetCode()"      单击展示源代码
 *  btn         None        点击运行    onclick="submitTryit()"    单击运行代码展示区代码
 * textarea textareaCode    代码                                    显示代码
 * div      htmlarea                                                运行textarea中的代码
 * 
 */

if(isset( $_GET["link"])){
    $link = $_GET["link"];
}else{
    //还需要在这里验证权限
    //这种情况属于非法进入，应当直接予以退出处理
    echo "<script>alert('非法get访问wtr-comp-link.php！'); window.location.href='main-login.php';</script>";
}

echo <<<theEnd
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>编辑 $link</title>
    <script>
    function accesskey(){
      document.getElementById('btn-default').accessKey="y"
      document.getElementById('btn-runing').accessKey="r"
      document.getElementById('subhtmlpage').accessKey="s"
    }
    </script>
</head>
<body onload="accesskey()">
<div id="container" style="width:1500px">

<div id="header" style="background-color:#9ab488;">
    <h1 style="margin-bottom:0;">学习小站</h1>
</div>
theEnd;
?>
<div id="codearea" style="background-color:#e7e7e7;height:700px;width:700px;float:left;">
    <div id="codearea-heading">
        <div style="float:left">
            <button id="btn-default" type="button" onclick="resetCode()" class="btn btn-default">源代码(<u>Y</u>)</button>
        </div>
        <div style="float:right">
            <button id="btn-runing" type="button" onclick="submitTryit()" id="submitBTN"><span class="glyphicon glyphicon-send"></span> 查看预览(<u>R</u>un)</button>
        </div>
    </div>
    <div>
    <form action="wtr-comp-link-insupd.php" method="post">
        <?php
        $connname = $_SESSION['userinfo']['connname'];
        include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
        $db=$conne->getconneinfo('dBase');
        //$rs= $conne->getRowsRst("select * from runoob.try "); 
        $rs2= $conne->getRowsRst("SELECT htmlpage FROM $db.htmlpage WHERE link='$link'");
        //$rsstr1 = $rs["code"];
        $rs2str = $rs2["htmlpage"];
        echo "<input type=\"text\" name=\"link\" value=\"$link\" style=\"display:none\">";
        ?>
        
        <textarea id="textareaCode" name="htmlpage" rows="40" cols="80" oninput="txtainput()"><?php
        $replace = array("\\n","&ltbr /&gt");
        $find = array("\r\n","\r\n");
        //$textstr = str_replace($replace,$find,$rs2["htmlpage"]);
        $textstr = str_replace($replace,$find,$rs2str);
        echo $textstr;
        ?></textarea>
        <input type="submit" id="subhtmlpage" name="subhtmlpage" value="提交(S)">
</form>
    </div>
</div>
<div id="midcut" style="width:100px;float:left;"><br/></div>
<div id="htmlarea" style="background-color:#e7e7e7;height:700px;width:700px;float:left;">
    <div id="iframewrapper">

    </div>
</div>
<footer>
<div id="footer">
    <?php    
    include_once $_SERVER['DOCUMENT_ROOT'].'/tools/advergers.php'; givemewords($advergerswords,"Tony");      
    //include_once $_SERVER['DOCUMENT_ROOT'].'/tools/advergers.php'; givemewords($advergerswords);      
    ?>
    
</div>
</footer>
</div>
<div id="testsql" style="background-color:#e7e7e7;height:100px;width:1500px">
    <textarea id="texsqltx" name="texsqltx" rows="2" cols="211"></textarea>
</div>
<script>
function autodivheight(){
    document.getElementById("textareaCode").height="700px";
    document.getElementById("iframeResult").style.width= 700 +"px";
    document.getElementById("iframeResult").style.height= 700 +"px";
}
function resetCode() {
  var initCode = "<?php 
    $find = array("<",">","\\\"");
    $replace = array("&lt;","&gt;","&quot;");
    $htmlpage =str_replace($replace,$find,$rs2["htmlpage"]);
    echo $htmlpage;    
    ?>"
  document.getElementById("textareaCode").value = initCode;
}

function submitTryit(){
    var text = document.getElementById("textareaCode").value;
    string = text.replace(/\r\n/g,"<br>")
    string = text.replace(/\n/g,"<br>");
    
    var ifr = document.createElement("iframe");
    ifr.setAttribute("frameborder", "0");
    ifr.setAttribute("id", "iframeResult");  
    document.getElementById("iframewrapper").innerHTML = "";
    document.getElementById("iframewrapper").appendChild(ifr);
    
    var ifrw = (ifr.contentWindow) ? ifr.contentWindow : (ifr.contentDocument.document) ? ifr.contentDocument.document : ifr.contentDocument;
    ifrw.document.open();
    ifrw.document.write(string);  
    ifrw.document.close();
    autodivheight();


}


function txtainput(){
    submitTryit();
    document.getElementsByName("subhtmlpage")[0].style.background="red";
}
submitTryit();
autodivheight();

</script>
</body>
</html>