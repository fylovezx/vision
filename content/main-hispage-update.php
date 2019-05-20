<?php 
$CtLoc = $_SESSION['pageinfo']['CtLoc'];
$in = $_SESSION['pageinfo'][$CtLoc];
$userid = $_SESSION['userinfo']['userid'];
$adr = $CtLoc.";".$in;
$mark = $_SESSION['include'];
unset($_SESSION['include']);
$sql="DELETE FROM $db.`hispage` WHERE userid = $userid AND adr = '$adr' ";
$num= $conne->uidRst($sql);
$sql="INSERT INTO $db.`hispage`(`time`, `userid`, `adr`, `mark`) VALUES (NOW(), $userid, '$adr','$mark')";
$num= $conne->uidRst($sql);
// echo $sql."<br>";
// echo $num."<br>";


?>