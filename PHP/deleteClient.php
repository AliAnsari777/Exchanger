<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$clientId = htmlentities($_GET['id']);
	}
	
	require_once "classes.php";
	
	$deleteClient = new Clients();
	$deleteClient->SetClientId($clientId);
	$deleteClient->deleteClient();
	
	echo "<script> 	window.close(); </script>"
?>