<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$filter = new MoneyTransmission();
	$filter->SetCurrencyFilter(htmlentities($_POST['filterValue']));
	$filter->SetCompanyId(htmlentities($_POST['companyId']));
	$id = $filter->GetCompanyId();
	$filter->CurrencyFilter($id);
?>