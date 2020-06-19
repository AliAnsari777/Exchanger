<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$filter = new Capital();
	$filter->SetCurrencyFilter(htmlentities($_POST['filterValue']));
	$filter->CurrencyFilter();
?>