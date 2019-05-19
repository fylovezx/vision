<?php 
session_start();
//用于调取历史记录
$connname = $_SESSION['userinfo']['connname'];
include_once $_SERVER['DOCUMENT_ROOT'].'/tools/conn.php';setconnparm($conne,$connname);
$db=$conne->getconneinfo('dBase'); 
$sql = "SELECT adr FROM $db.hispage ";
$rshis = $conne->getRowsArray($sql);
foreach($rshis as $his){
    $hisarr = explode(';',$his);
    $hismain = $hisarr[0];
    $hisin = $hisarr[1];
    echo "<a href=\"content/main-changepage.php?page=$hismain&in=$hisin\"><br>";
}
print_r(time());
?>