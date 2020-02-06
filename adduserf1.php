<!DOCTYPE html>
<html>
<head>
	<title>PHP and mysql</title>
	<meta http-equiv="refresh" content="5; url=edit.php"/>
</head>
<body>
<center>
<?php
include 'config.php';
$checkuser = "SELECT * FROM member WHERE Username = $_POST[Username]"; 
$checkuserst = $mysqli->query($checkuser);
$num_rows=mysqli_num_rows($objQuerystst);

if ($num_rows>0) {
	$idadd = $num_rows+1;
}
else {
	$idadd = 1;
}
if ($checkuserst["Username"]=$_POST[Username]) {
	echo "มีผู้ใช้อยู่ในระบบอยู่แล้ว";
}
else {
	$sqlquery = "INSERT INTO member VALUES ('$idadd','$_POST[Username]','$_POST[Password]','$_POST[Name]','0','0000-00-00 00:00:00')";
	$results= mysqli_query($mysqli,$sqlquery);
	
}
?>
เพิ่มข้อมูลแล้ว
<br>
<?php
$flgCreate = mkdir("myfile/$_POST[Username]");
if($flgCreate)
{
	echo "Folder Created <br>";
}
else
{
	echo "ไม่สามารถสร้าง Folder ได้ <br>";
}
?>
กำลังพากลับไปหน้าจัดการเว็บ ถ้าเว็บไม่พาไป <a href="edit.php">คลิกที่นี้</a>
</center>
</body>
</html>
<?php
mysqli_close();
?>