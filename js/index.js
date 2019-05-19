function AjaxRefHist()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("main-hispage").innerHTML=xmlhttp.responseText;
        }
    }
    var timestamp =Date.parse(new Date());
    xmlhttp.open("GET","content/main-hispage.php?time="+timestamp,true);
    xmlhttp.send();
}