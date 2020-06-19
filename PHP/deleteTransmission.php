<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$transmissionId = htmlentities($_GET['id']);
	}
	
	require_once "classes.php";
	
	$deleteTransmission = new MoneyTransmission();
	$deleteTransmission->SetId($transmissionId);
	$deleteTransmission->DeleteTransmission();
	
	echo "<script> 	window.close(); </script>"
?>