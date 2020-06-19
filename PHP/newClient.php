<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$client = new Clients();
	
	$client->SetName(htmlentities($_POST['name']));
	$client->SetCompany(htmlentities($_POST['company']));
	$client->SetPhone(htmlentities($_POST['phone']));
	$client->SetUserId(htmlentities($_SESSION['userId'])); // this is user id which seted in session in login process.
	
	$client->NewClient();
	echo "<script>	window.close(); </script>";
?>