<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$clientId = htmlentities($_GET['id']);
	}
	
	require_once "classes.php";
	
	$deleteClient = new TemporaryClients();
	$deleteClient->SetClientId($clientId);
	$deleteClient->deleteTempClient();
	
	echo "<script> 	window.close(); </script>"
?>