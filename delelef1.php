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
<br>
กำลังพากลับไปหน้าจัดการเว็บ ถ้าเว็บไม่พาไป <a href="edit.php?<?php echo $objResultst["adminid"];?>">คลิกที่นี้</a>
<?php
$flgDelete = unlink("myfile/$_POST[postby]/$_POST[downloadurl]");
if($flgDelete)
{
	echo "File Deleted";
}
else
{
	echo "File can not delete";
}

$sqlquery = "DELETE FROM hello WHERE id ='$_POST[id]'";
$results=$mysqli->query($sqlquery);
?>
</center>
</body>
</html>
<?php
mysql_close($mysqli);
?>