function changepage(th)
{
    var xmlhttp;
    cgbgcolor(th.id);
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
    xmlhttp.open("GET","content/sys.php?page="+th.id+"&time="+timestamp,true);
    xmlhttp.send();
} 
   
function cgbgcolor(th){
    document.getElementById(th).style.background =  '#c3d08d';
    setTimeout(function(){ document.getElementById(th).style.background =  ''; }, 3000);
}

function opdbtip(th) {
    var showDiv = document.getElementById('tipsdiv');
    showDiv.style.color='red';
    showDiv.innerHTML = th;
}

function tipout() {
    var showDiv = document.getElementById('tipsdiv');
    showDiv.style.color='';
    showDiv.innerHTML = '操作提示：无';
}

function opdb(th)
{
    var opdbtext =document.getElementById("opdbtext").value;
    if(opdbtext == th.id){                    
        var xmlhttp;
        cgbgcolor(th.id);
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
        xmlhttp.open("GET","content/opdb.php?opdb="+th.id+"&time="+timestamp,true);
        xmlhttp.send();
    }else{
        document.getElementById("opdbrs").innerHTML=th.id+":您输入的操作指令与要求不符";
    }
} 