<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once("classes.php");
	
	$update = new Users();
	
	$update->SetId(htmlentities($_POST['id']));
	$update->SetName(htmlentities($_POST['name']));
	$update->SetGroup(htmlentities($_POST['group']));
	
	$update->UserUpdate();
	
	echo "<script>	window.close(); </script>";
?>