<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once("classes.php");
	
	$update = new TransmissionCompanies();
	
	$update->SetId(htmlentities($_POST['id']));
	$update->SetName(htmlentities($_POST['name']));
	$update->SetCompany(htmlentities($_POST['company']));
	$update->SetPlace(htmlentities($_POST['place']));
	$update->SetPhone(htmlentities($_POST['phone']));
	
	$update->UpdateTransmissionCompany();
	
	echo "<script>	window.close(); </script>";
?>