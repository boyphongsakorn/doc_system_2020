<?php
$mysqli = new mysqli('localhost','root','','doc');
mysqli_set_charset($mysqli, "utf8");
$q="SELECT * FROM hello ORDER BY id ASC"; 
$qst="SELECT * FROM settings"; 
$qstst="SELECT * FROM member";
$objQuery = $mysqli->query($q);
$objQueryst = $mysqli->query($qst);
$objQuerystst = $mysqli->query($qstst);

//*** Reject user not online
	$intRejectTime = 5; // Minute
	$sql = "UPDATE member SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
	$query = mysqli_query($mysqli,$sql);

$objResultst = mysqli_fetch_array($objQueryst);
?>