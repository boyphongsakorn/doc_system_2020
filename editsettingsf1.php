<?php
session_start();

include 'config.php';

$sqlquery = "UPDATE settings SET logourl = '$_POST[logourl]',headurl = '$_POST[headurl]',title = '$_POST[title]',titlecolor = '$_POST[titlecolor]' WHERE adminid = '$_SESSION[ID]'";
$results=$mysqli->query($sqlquery);

if($results !== false){
    echo 'อัพเดตสำเร็จ';
} else {
    echo 'อัพเดตไม่สำเร็จ';
}
?>