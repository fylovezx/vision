<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="container" style="width:1500px">
        
        <div id="header" style="background-color:#9ab488;">
            <h1 style="margin-bottom:0;">网页头部菜单</h1>
        </div>
        
        <div id="codearea" style="background-color:#e7e7e7;height:700px;width:700px;float:left;">
		<div class="panel-heading">
			<form class="form-inline">
                <div class="row">
                    <div style="float:left">
                        <button type="button" onclick="resetCode()" class="btn btn-default">源代码：</button>
                        </div>
                        <div style="float:right">
                        <button type="button" onclick="submitTryit()" id="submitBTN"><span class="glyphicon glyphicon-send"></span> 点击运行</button>
                    </div>
                </div>
            </form>
		</div>
        <div>
			<textarea class="form-control"  id="textareaCode" name="textareaCode" rows="40" cols="80">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt; 
&lt;meta charset=&quot;utf-8&quot;&gt; 
&lt;title&gt;菜鸟教程(runoob.com)&lt;/title&gt; 
&lt;/head&gt;
&lt;body&gt;

&lt;div id=&quot;container&quot; style=&quot;width:500px&quot;&gt;

&lt;div id=&quot;header&quot; style=&quot;background-color:#FFA500;&quot;&gt;
&lt;h1 style=&quot;margin-bottom:0;&quot;&gt;主要的网页标题&lt;/h1&gt;&lt;/div&gt;

&lt;div id=&quot;menu&quot; style=&quot;background-color:#FFD700;height:200px;width:100px;float:left;&quot;&gt;
&lt;b&gt;菜单&lt;/b&gt;&lt;br&gt;
HTML&lt;br&gt;
CSS&lt;br&gt;
JavaScript&lt;/div&gt;

&lt;div id=&quot;content&quot; style=&quot;background-color:#EEEEEE;height:200px;width:400px;float:left;&quot;&gt;
内容在这里&lt;/div&gt;

&lt;div id=&quot;footer&quot; style=&quot;background-color:#FFA500;clear:both;text-align:center;&quot;&gt;
版权 © runoob.com&lt;/div&gt;

&lt;/div&gt;

&lt;/body&gt;
&lt;/html&gt;
                </textarea>
		</div>
        </div>
        <div id="midcut" style="width:100px;float:left;"><br/></div>
        <div id="htmlarea" style="background-color:#e7e7e7;height:700px;width:700px;float:left;">
        <div id="iframewrapper"></div>
        </div>
        <footer>
            <div id="footer">
            I understand ,my child.Better than anyone. Today,I lost more than you know.
            </div>
        </footer>
    </div>
<script>
function autodivheight(){
    var winHeight=0;
    if (window.innerHeight) {
        winHeight = window.innerHeight;
    } else if ((document.body) && (document.body.clientHeight)) {
        winHeight = document.body.clientHeight;
    }
    //通过深入Document内部对body进行检测，获取浏览器窗口高度
    if (document.documentElement && document.documentElement.clientHeight) {
        winHeight = document.documentElement.clientHeight;
    }
    height = winHeight;
    document.getElementById("textareaCode").height="700px";
    document.getElementById("iframeResult").style.width= 700 +"px";
    document.getElementById("iframeResult").style.height= height +"px";
}


function resetCode() {
  var initCode = "<!DOCTYPE html>\n<html>\n<head>\u00a0\n<meta\u00a0charset=\"utf-8\">\u00a0\n<title>\u83dc\u9e1f\u6559\u7a0b(runoob.com)<\/title>\u00a0\n<\/head>\n<body>\n\n<div id=\"container\" style=\"width:500px\">\n\n<div id=\"header\" style=\"background-color:#FFA500;\">\n<h1 style=\"margin-bottom:0;\">\u4e3b\u8981\u7684\u7f51\u9875\u6807\u9898<\/h1><\/div>\n\n<div id=\"menu\" style=\"background-color:#FFD700;height:200px;width:100px;float:left;\">\n<b>\u83dc\u5355<\/b><br>\nHTML<br>\nCSS<br>\nJavaScript<\/div>\n\n<div id=\"content\" style=\"background-color:#EEEEEE;height:200px;width:400px;float:left;\">\n\u5185\u5bb9\u5728\u8fd9\u91cc<\/div>\n\n<div id=\"footer\" style=\"background-color:#FFA500;clear:both;text-align:center;\">\n\u7248\u6743 \u00a9 runoob.com<\/div>\n\n<\/div>\n \n<\/body>\n<\/html>"  
  document.getElementById("textareaCode").value = initCode;
}

function submitTryit() {
  var text = document.getElementById("textareaCode").value;
  var patternHtml = /<html[^>]*>((.|[\n\r])*)<\/html>/im
  var patternHead = /<head[^>]*>((.|[\n\r])*)<\/head>/im
  var array_matches_head = patternHead.exec(text);
  var patternBody = /<body[^>]*>((.|[\n\r])*)<\/body>/im;
  
  var array_matches_body = patternBody.exec(text);
  var basepath_flag = 1;
  var basepath = '';
  if(basepath_flag) {
    basepath = '<base href="//www.runoob.com/try/demo_source/" target="_blank">';
  }
  if(array_matches_head) {
    text = text.replace('<head>', '<head>' + basepath );
  } else if (patternHtml) {
    text = text.replace('<html>', '<head>' + basepath + '</head>');
  } else if (array_matches_body) {
    text = text.replace('<body>', '<body>' + basepath );
  } else {
    text = basepath + text;
  }
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