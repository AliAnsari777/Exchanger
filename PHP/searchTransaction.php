<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	if(isset($_SESSION['id']))
	{
		// 'htmlentities' is used for sanitizing the super global variables.
		// it converts all characters into html entities and prevent exploit attack.
		$clientId =  htmlentities($_SESSION['id']);
		$clientName =  htmlentities($_SESSION['name']);
	}
	
	$searchTransaction = new Transactions();
	$searchTransaction->SetSearchValue(htmlentities($_POST['searchValue']));
	$searchTransaction->SetSearchParameter(htmlentities($_POST['parameter']));
	$searchTransaction->Search($clientId, $clientName);
?>