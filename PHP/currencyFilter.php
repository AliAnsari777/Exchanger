<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	if(isset($_SESSION['id']))
	{
		$id = htmlentities($_SESSION['id']);
	}
	
	$filter = new Transactions();
	$filter->SetCurrencyFilter(htmlentities($_POST['filterValue']));
	$filter->CurrencyFilter($id);
?>