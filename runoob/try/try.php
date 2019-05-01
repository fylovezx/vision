<?php 
/**
 * 显示数据库中指定codename 的代码的效果，
 * 1.防止误入的措施
 *  无，则作为model练习
 * 2.运行流程
 *  根据$_POST["codename"]从mysql数据库中读取对应的code代码，
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


if(isset( $_GET["codename"])){
    $codename = $_GET["codename"];
}else{
    $codename = '未查询';
}

echo <<<theEnd
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>测试 $codename</title>
    <script>
    function accesskey(){
      document.getElementById('btn-default').accessKey="y"
      document.getElementById('btn-runing').accessKey="r"
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
            <button id="btn-runing" type="button" onclick="submitTryit()" id="submitBTN"><span class="glyphicon glyphicon-send"></span> 点击运行(<u>R</u>un)</button>
        </div>
    </div>
    <div>
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';
        //include_once "../tools/conn.php";
        setconnparm($conne);
        $rs= $conne->getRowsRst("select * from runoob.code where codename='".$codename."'");
        ?>
        <textarea id="textareaCode" rows="40" cols="80"><?php
        $replace = array("\\n");
        $find = array("\r\n");
        $textstr = str_replace($replace,$find,$rs["code"]);
        echo $textstr;
        ?>
        </textarea>
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
    $replace = array("&lt","&gt","&quot;");
    $code =str_replace($replace,$find,$rs["code"]);
    echo $code;    
    ?>"
  document.getElementById("textareaCode").value = initCode;
}

function submitTryit(){
    var text = document.getElementById("textareaCode").value;
    var text = document.getElementById("textareaCode").value;
    var patternHtml = /<html[^>]*>((.|[\n\r])*)<\/html>/im
    var patternHead = /<head[^>]*>((.|[\n\r])*)<\/head>/im
    var array_matches_head = patternHead.exec(text);
    var patternBody = /<body[^>]*>((.|[\n\r])*)<\/body>/im;
    
    var ifr = document.createElement("iframe");
    ifr.setAttribute("frameborder", "0");
    ifr.setAttribute("id", "iframeResult");  
    document.getElementById("iframewrapper").innerHTML = "";
    document.getElementById("iframewrapper").appendChild(ifr);
    
    var ifrw = (ifr.contentWindow) ? ifr.contentWindow : (ifr.contentDocument.document) ? ifr.contentDocument.document : ifr.contentDocument;
    ifrw.document.open();
    ifrw.document.write(text);  
    ifrw.document.close();
    autodivheight();


}
submitTryit();
autodivheight();

</script>
</body>
</html>