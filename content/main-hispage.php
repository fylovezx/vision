<?php 
session_start();
//用于调取历史记录
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
$userid = $_SESSION['userinfo']['userid'];
$sql = "SELECT mark,adr FROM $db.hispage WHERE userid = $userid ORDER BY time DESC";
$rshis = $conne->getRowsArray($sql);
foreach($rshis as $his){
    $hisarr = explode(';',$his['adr']);
    $hismain = $hisarr[0];
    $hisin = $hisarr[1];
    echo "<a href=\"content/main-changepage.php?page=$hismain&in=$hisin\">".$his['mark']."</a><br>";
}
print_r(time());
?>