<?php
	session_start();

	require_once("config.php");
	
	$strUsername = mysqli_real_escape_string($mysqli,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($mysqli,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM member WHERE Username = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuerye = mysqli_query($mysqli,$strSQL);
	$objResulte = mysqli_fetch_array($objQuerye);
	if(!$objResulte)
	{
		echo "Username and Password Incorrect!";
		exit();
	}
	else
	{
		if($objResulte["LoginStatus"] == "1")
		{
			echo "'".$strUsername."' Exists login!";
			exit();
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE member SET LoginStatus = '1' , LastUpdate = NOW() WHERE Username = '".$objResulte["Username"]."' ";
			$query = mysqli_query($mysqli,$sql);

			//*** Session
			$_SESSION["UserID"] = $objResulte["Username"];
			$_SESSION["ID"] = $objResulte["UserID"];
			session_write_close();

			//*** Go to Main page
			header("location:edit.php");
		}
			
	}
	mysqli_close($con);
?>
