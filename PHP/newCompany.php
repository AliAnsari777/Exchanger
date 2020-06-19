<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$company = new TransmissionCompanies();
	
	$company->SetName(htmlentities($_POST['name']));
	$company->SetCompany(htmlentities($_POST['company']));
	$company->SetPlace(htmlentities($_POST['place']));
	$company->SetPhone(htmlentities($_POST['phone']));
	$company->SetUserId(htmlentities($_SESSION['userId'])); // this is user id which seted in session in login process.
	
	$company->newCompany();
	echo "<script>	window.close(); </script>";
?>