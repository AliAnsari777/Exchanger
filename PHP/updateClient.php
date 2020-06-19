<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once("classes.php");
	
	$update = new Clients();
	
	$update->SetId(htmlentities($_POST['id']));
	$update->SetName(htmlentities($_POST['name']));
	$update->SetCompany(htmlentities($_POST['company']));
	$update->SetPhone(htmlentities($_POST['phone']));
	
	$update->Update();
	echo "<script>	window.close(); </script>";
?>