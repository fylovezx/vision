<?php 
if(isset($_GET['page'])){
$page = $_GET['page'];
}else{
$page='opdb';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,'vsrbcx');
$db=$conne->getconneinfo('dBase'); 
switch ($page)
{
case "opdb":
echo <<<opbd
管理数据库<br>
        <div id="opdbmenu">
        <span id="skpl"  style="color:green;" onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除数据库,将失去所有数据,在此操作前请确认铺盖已卷好！')" onmouseout="tipout()">删库跑路</span>
        <span id="cxks"  style="color:green;" onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除原来所有数据并重建数据库结构,您将失去所有数据')" onmouseout="tipout()">重新开始</span>
        <span id="sjhf"  style="color:green;"  onclick="opdb(this)" onmouseover="opdbtip('操作提示：删除原来的数据并从sql文件中重新导入数据，您亦失去之前的所有数据')" onmouseout="tipout()">数据恢复</span>
        <span id="bfsj"  style="color:green;"  onclick="opdb(this)" onmouseover="opdbtip('操作提示：这个选择太明智了，一定要定期备份数据库哦！')" onmouseout="tipout()">备份数据</span>
        <input type="text" id="opdbtext" value="">
        </div>
        <div id="tipsdiv" >操作提示：无</div>
        <div id="opdbstatus">
            <div id="opdbrs">暂无操作</div>
            <div id="opdbmain">
opbd;
            //这里需要看是没有数据库，还是有库无表
            if($conne->dbexist()){
                $sql = <<<sql
                SELECT table_name AS tbname,TABLE_COMMENT AS tbcmnt ,TABLE_ROWS as tbrows
                FROM  INFORMATION_SCHEMA.TABLES 
                WHERE table_schema = '$db' ;
sql;
                $rs = $conne->getRowsArray($sql);
                if(count($rs)){
                    $fieldarray =array('tbname','tbcmnt','tbrows');
                    $tharray =array('表名','表说明','当前行数');
                    rstotable($rs,$fieldarray,$tharray);
                }else{
                    echo "          数据库中没有表,这个宇宙空空如也，快重建它！";
                }                
            }else{
                echo "          上一个程序员删库跑路了，这个数据库不存在。<br>My hero ,宇宙需要你来重建！\r\n";
            }
        echo "          </div>";
        echo "                  </div>";
echo <<<script
                <script>
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
                </script>
script;

    break;
case "addsf":
        echo "添加书架<br>";
        $sql = "SELECT * FROM $db.shelf ORDER BY sfsnum";        
        $rs = $conne->getRowsArray($sql); 
        if(count($rs)){
            foreach($rs as $sflist){
                $idsf = $sflist['idsf'];
                $sfname = $sflist['sfname'];
                $idfr = 1;
                $sfsnum = $sflist['sfsnum'];
                echo "当前书架：序号 => $sfsnum ;标识 =>$idsf ;名称 => $sfname<br>\r\n";
            }
        }else{
            echo "          书架表内为空！";
        }  

            echo <<<THE
<form action="" method="post">
    序号：<input type="text" name="sfsnum" >名称: <input type="text" name="sfname">
    <input type="submit" name="insertsf" value="提交书架信息">
</form> 
THE;
        break;
case "addbk":
        echo "添加书目";        
        $sql = "SELECT bkname,bkintro FROM $db.book";
        $rs = $conne->getRowsArray($sql) ;
        foreach($rs as $bksf){
            $bk = $bksf['bkname'];
            $sf = $bksf['bkintro'];
            echo "书目简介：$sf => $sf <br>";
        }
    break;
case "syslog":        
        echo "操作日志";
        $sql = "SELECT * FROM $db.syslog";
        try{
            $rs = $conne->getRowsArray($sql) ;
        }catch(Throwable $e){
            print_r($e);
        }  
        foreach($rs as $log){
            $idlog = $log['idlog'];
            $mtime = $log['mtime'];
            $rssql = $log['sql'];
            $username = $log['username'];
            echo "日志序号 => $sfsnum ;操作人 =>$username ;时间 =>$idsf ;<br>内容 => $rssql<br>\r\n";
        }
    break;
default:
    //这里应该是强制跳转;
    break;
}
$conne->close_conn();
?>