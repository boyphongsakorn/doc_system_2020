<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP and mysql</title>
	<meta http-equiv="refresh" content="5; url=edit.php"/>
</head>
<body>
<center>
แก้ไขข้อมูลแล้ว
<?php
$sqlquery = "UPDATE hello SET name = '$_POST[name]',comment = '$_POST[comment]',data = '$_POST[data]',downloadurl = '$_POST[downloadurl]' WHERE id ='$_POST[id]'";
$results=$mysqli->query($sqlquery);
?>
</center>
</body>
</html>
<?php
mysql_close();
?>