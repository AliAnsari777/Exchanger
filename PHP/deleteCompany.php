<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$companyId = htmlentities($_GET['id']);
	}
	
	require_once "classes.php";
	
	$deleteTransaction = new TransmissionCompanies();
	$deleteTransaction->SetId($companyId);
	$deleteTransaction->DeleteTransmissionCompany();
	
	echo "<script> 	window.close(); </script>"
?>