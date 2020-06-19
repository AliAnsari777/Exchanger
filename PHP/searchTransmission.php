<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$searchTransaction = new MoneyTransmission();
	$searchTransaction->SetSearchValue(htmlentities($_POST['searchValue']));
	$searchTransaction->SetSearchParameter(htmlentities($_POST['parameter']));
	$searchTransaction->SetCompanyId(htmlentities($_POST['companyId']));
	$id = $searchTransaction->GetCompanyId();
	$searchTransaction->DisplayTransmission($id);
?>