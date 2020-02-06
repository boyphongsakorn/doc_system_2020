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

$num_rows=mysqli_num_rows($objQuery);

if ($num_rows>0) {
	$idadd = $num_rows;
}
else {
	$idadd = 0;
}
if (!file_exists("myfile/".$_POST['Username'])) {
    mkdir("myfile/".$_POST['Username'], 0777, true);
}

if( file_exists("myfile/".$_POST['Username']."/".$_FILES["filUpload"]["name"]) )
{
	echo "มีไฟล์อยู่แล้ว กรุณาเปลี่ยนชื่อไฟล์แล้ว Upload ใหม่";
}

else
{ 
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_POST['Username']."/".$_FILES["filUpload"]["name"]))
	{
		echo "Upload Complete<br>";
		$filename = $_FILES["filUpload"]["name"];
		$sqlquery = "INSERT INTO hello VALUES ('$idadd','$_POST[name]','$_POST[comment]','$_POST[data]','$filename','$_POST[Username]')";
		$results= mysqli_query($mysqli,$sqlquery);
	}
	else {
		echo "Upload Not Complete<br>";
	}
}
?>
เพิ่มข้อมูลแล้ว
<br>
กำลังพากลับไปหน้าจัดการเว็บ ถ้าเว็บไม่พาไป <a href="edit.php">คลิกที่นี้</a>
</center>
</body>
</html>
<?php
mysqli_close();
?>