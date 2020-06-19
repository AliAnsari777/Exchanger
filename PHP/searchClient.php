<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$searchClient = new Clients();
	$searchClient->SetSearchValue(htmlentities($_POST['searchValue']));
	$searchClient->SetSearchParameter(htmlentities($_POST['parameter']));
	$searchClient->DisplayClients();
?>