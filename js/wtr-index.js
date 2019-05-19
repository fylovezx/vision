function AjaxWtrComp(struid)
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
            document.getElementById("wtr-content").innerHTML=xmlhttp.responseText;
        }
    }
    var timestamp =Date.parse(new Date());
    xmlhttp.open("GET","content/wtr-index-comp.php?struid="+struid+"&time="+timestamp,true);
    xmlhttp.send();
}

function AjaxWtrNew(struid)
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
            document.getElementById("wtr-comp-content").innerHTML=xmlhttp.responseText;
        }
    }
    var timestamp =Date.parse(new Date());
    xmlhttp.open("GET","content/wtr-comp-content.php?struid="+struid+"&time="+timestamp,true);
    xmlhttp.send();
}

function AjaxWtrVis(link)
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
            document.getElementById("wtr-comp-content").innerHTML=xmlhttp.responseText;
        }
    }
    var timestamp =Date.parse(new Date());
    xmlhttp.open("GET","content/wtr-comp-content.php?struid=link-"+link+"&time="+timestamp,true);
    xmlhttp.send();
}


function chkcpin(form){
    var re = /^[0-9]+.?[0-9]*$/; //判断字符串是否为数字 //判断正整数 /^[1-9]+[0-9]*]*$/ 
　　 var nubmer = form.cpsnum.value;

　　if (!re.test(nubmer)) {
　　　　alert("请在第X章内输入数字");
　　　　form.cpsnum.select();
　　　　return false;
　　}

    if(form.cpname.value==""){
        alert("请输入章名称!");
        form.cpname.select();
        return(false);
    }

    if(form.link.value==""){
        alert("请输入指向的链接!");
        form.link.select();
        return(false);
    }
   return(true);

  }

  function chkscin(form){
    var re = /^[0-9]+.?[0-9]*$/; //判断字符串是否为数字 //判断正整数 /^[1-9]+[0-9]*]*$/ 
　　 var nubmer = form.scsnum.value;

　　if (!re.test(nubmer)) {
　　　　alert("请在第X章内输入数字");
　　　　form.scsnum.select();
　　　　return false;
　　}

    if(form.scname.value==""){
        alert("请输入章名称!");
        form.scname.select();
        return(false);
    }

    if(form.link.value==""){
        alert("请输入指向的链接!");
        form.link.select();
        return(false);
    }
   return(true);
   
  }