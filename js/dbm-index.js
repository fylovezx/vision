function AjaxDbmContent(th)
{
    //获取oplib 书库管理请使用AjaxDbmOplib函数
    var xmlhttp;
    DbmcCgbgcolor(th.id);
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
            document.getElementById("dbm-content").innerHTML=xmlhttp.responseText;
        }
    }
    var timestamp =Date.parse(new Date());
    xmlhttp.open("GET","content/dbm-index-content.php?page="+th.id+"&time="+timestamp,true);
    xmlhttp.send();
} 

function AjaxDbmOpdb(th)
{
    var opdbtext =document.getElementById("opdbtext").value;
    DbmcCgbgcolor(th.id);
    if(opdbtext == th.id){                    
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
                document.getElementById("opdbstatus").innerHTML=xmlhttp.responseText;
            }
        }
        var timestamp =Date.parse(new Date());
        xmlhttp.open("GET","content/dbm-inedx-opdb.php?opdb="+th.id+"&time="+timestamp,true);
        xmlhttp.send();
    }else{
        document.getElementById("opdbrs").innerHTML=th.id+":您输入的操作指令与要求不符";
    }
} 

function AjaxDbmOplib(struid)
{
    DbmcCgbgcolor('oplib');
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
            document.getElementById("dbm-content").innerHTML=xmlhttp.responseText;
        }
    }
    var timestamp =Date.parse(new Date());
    xmlhttp.open("GET","content/dbm-index-oblib.php?struid="+struid+"&time="+timestamp,true);
    xmlhttp.send();
} 

function DbmcCgbgcolor(th){
    document.getElementById(th).style.background =  '#c3d08d';
    setTimeout(function(){ document.getElementById(th).style.background =  ''; }, 3000);
}

function DbmOpdbTipin(th) {
    var showDiv = document.getElementById('tipsdiv');
    showDiv.style.color='red';
    showDiv.innerHTML = th;
}

function DbmOpdbTipinout() {
    var showDiv = document.getElementById('tipsdiv');
    showDiv.style.color='';
    showDiv.innerHTML = '操作提示：无';
}


function chksfin(form){
    var re = /^[0-9]+.?[0-9]*$/; //判断字符串是否为数字 //判断正整数 /^[1-9]+[0-9]*]*$/ 
　　 var nubmer = form.sfsnum.value;

　　if (!re.test(nubmer)) {
　　　　alert("请在书架序号内输入数字");
　　　　form.sfsnum.select();
　　　　return false;
　　}

    if(form.sfname.value==""){
        alert("请输入书架名称!");
        form.sfname.select();
        return(false);
    }

    if(form.link.value==""){
        alert("请输入指向的链接!");
        form.link.select();
        return(false);
    }
   return(true);
   
  }

  function chkbkin(form){
    var re = /^[0-9]+.?[0-9]*$/; //判断字符串是否为数字 //判断正整数 /^[1-9]+[0-9]*]*$/ 
　　 var nubmer = form.bksnum.value;

　　if (!re.test(nubmer)) {
　　　　alert("请在书籍序号内输入数字");
　　　　form.bksnum.select();
　　　　return false;
　　}

    if(form.bkname.value==""){
        alert("请输入书籍名称!");
        form.bkname.select();
        return(false);
    }
    
    if(form.bkicon.value=="" || form.bkicon.value== null){
        alert("请选择上传的ico!");
        form.bkicon.select();
        return(false);

    }

    if(form.bkintro.value==""){
        alert("请输入书本的简介!");
        form.bkintro.select();
        return(false);

    }

    var reg = /^[0-9a-zA-Z]+$/
    var linkprefix = form.linkprefix.value;
    if(!reg.test(linkprefix) || form.linkprefix.value==""){
    alert("你输入的链接前缀不是数字或者字母");
    form.link.select();
    return(false);
    }
   return(true);
   
  }