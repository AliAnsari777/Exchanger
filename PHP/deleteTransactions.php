<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$transactionId = htmlentities($_GET['id']);
	}
	
	require_once "classes.php";
	
	$deleteTransaction = new Transactions();
	$deleteTransaction->SetId($transactionId);
	$deleteTransaction->DeleteTransaction();
	
	echo "<script> 	window.close(); </script>"
?>