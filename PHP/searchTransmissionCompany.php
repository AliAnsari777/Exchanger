<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$searchTransaction = new TransmissionCompanies();
	$searchTransaction->SetSearchValue(htmlentities($_POST['searchValue']));
	$searchTransaction->SetSearchParameter(htmlentities($_POST['parameter']));
	$searchTransaction->DisplayCompanies();
?>