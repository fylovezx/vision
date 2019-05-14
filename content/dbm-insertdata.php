<?php
$dataarray = $_SESSION['postdata'];
$stru = $dataarray['stru'];
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
$mysqltime = $conne->getMysqlTIME();
$username = $_SESSION['userinfo']['uname'];
$userid = $_SESSION['userinfo']['userid'];
switch ($stru){
    case "shelf":
        $sfname = $dataarray['sfname'];
        $sfsnum = $dataarray['sfsnum'];
        $idfl =1;
        $sqlzlxh="UPDATE `$db`.`shelf` SET `sfsnum` = `sfsnum`+1 WHERE `sfsnum` >=$sfsnum and `idfl`=$idfl;";
        $sqlcrsf="INSERT INTO `$db`.`shelf` (`sfname`, `idfl`, `ctime`,`sfsnum`) VALUES ('$sfname', $idfl, '$mysqltime', $sfsnum );";
        $rsnum = array();
        $rsnum[] =$conne->uidRst($sqlzlxh);//这条语句应当是用来整理序号
        $rsnum[] =$conne->uidRst($sqlcrsf);
        $insertid = $conne->getinsertid();
        $sqlxrrz="INSERT INTO `$db`.`opliblog` (`mtime`, `userid`,`username`, `abs`) VALUES ('$mysqltime', ".
                    "$userid, '$username','在标识id为 $idfl 的楼层<br> 第$sfsnum 格新建名为 $sfname 书架,<br> 其标识id为$insertid');";
        $conne->uidRst($sqlxrrz);                
        $sqlzlxh=null;
        $sqlcrsf=null;
        $sqlxrrz=null;
        
        $conne->close_conn();
    break;
    case "book":

        $idsf = $dataarray['idsf'];
        $bkname =$dataarray['bkname'];
        $bksnum =$dataarray['bksnum'];
        $bkintro =$dataarray['bkintro'];
        $bkicon = $_FILES['bkicon']['name'];
        $link =$dataarray['link'];

        $dir = 'data/pic/icon/';
        $path = $dir.$_FILES['bkicon']['name'];
        if(!is_dir($dir)){
            mkdir($dir);
        }
        $move = move_uploaded_file($_FILES['bkicon']['tmp_name'],$path);

        $sqlzlxh="UPDATE `$db`.`book` SET `bksnum` = `bksnum`+1 WHERE `bksnum` >=$bksnum and `idsf`=$idsf;";
        $sqlcrbk="INSERT INTO `$db`.`book` (`ctime`,`bkname`, `idsf`, `bksnum`, `bkintro`, `bkicon`, `link`) ";
        $sqlcrbk .=" VALUES ('$mysqltime', '$bkname', $idsf, $bksnum ,'$bkintro','$bkicon','$link' );";
        $rsnum = array();
        $rsnum[] =$conne->uidRst($sqlzlxh);//这条语句应当是用来整理序号
        $rsnum[] =$conne->uidRst($sqlcrbk);
        $insertid = $conne->getinsertid();
        $sqlxrrz="INSERT INTO `$db`.`opliblog` (`mtime`, `userid`,`username`, `abs`) VALUES ('$mysqltime', ".
                    "$userid, '$username','在标识id为 $idsf 的书架<br> 第$bksnum 格新增名为 $bkname 的书籍,<br> 其标识id为$insertid');";
        $conne->uidRst($sqlxrrz);
        $sqlzlxh=null;
        $sqlcrbk=null;
        $sqlxrrz=null;
        $conne->close_conn();
    break;
    case "chapter":

        $idbk = $dataarray['idbk'];
        $cpname =$dataarray['cpname'];
        $cpsnum =$dataarray['cpsnum'];
        $link =$dataarray['link'];

        $sqlzlxh="UPDATE `$db`.`chapter` SET `cpsnum` = `cpsnum`+1 WHERE `cpsnum` >=$cpsnum and `idbk`=$idbk;";
        $sqlcrbk="INSERT INTO `$db`.`chapter` (`cpname`, `idbk`, `cpsnum` , `link` ) ";
        $sqlcrbk .=" VALUES ('$cpname', $idbk, $cpsnum, '$link');";
        $rsnum = array();
        $rsnum[] =$conne->uidRst($sqlzlxh);//这条语句应当是用来整理序号
        $rsnum[] =$conne->uidRst($sqlcrbk);
        $insertid = $conne->getinsertid();
        $sqlxrrz="INSERT INTO `$db`.`opliblog` (`mtime`, `userid`,`username`, `abs`) VALUES ('$mysqltime', ".
                    "$userid, '$username','在标识id为 $idbk 的书<br> 新增名为 $cpname 的章,<br> 其标识id为$insertid');";
        $conne->uidRst($sqlxrrz);
        $sqlzlxh=null;
        $sqlcrbk=null;
        $sqlxrrz=null;
        $conne->close_conn();

    break;
}



?>