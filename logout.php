<?php
	session_start();

	require_once("config.php");

	//*** Update Status
	$sqleee = "UPDATE member SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00' WHERE Username = '".$_SESSION["UserID"]."' ";
	$queryeee = mysqli_query($mysqli,$sqleee);

	session_destroy();
	header("location:index.php");
?>