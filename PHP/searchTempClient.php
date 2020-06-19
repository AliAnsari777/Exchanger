<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$searchTempClient = new TemporaryClients();
	$searchTempClient->SetSearchValue(htmlentities($_POST['searchValue']));
	$searchTempClient->SetSearchParameter(htmlentities($_POST['parameter']));
	$searchTempClient->DisplayTemporaryClients();
?>