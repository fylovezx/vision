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