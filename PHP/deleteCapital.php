<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$capitalId = htmlentities($_GET['id']);
	}
	
	require_once "classes.php";
	
	$deleteCapital = new Capital();
	$deleteCapital->SetId($capitalId);
	$deleteCapital->deleteCapital();
	
	echo "<script> 	window.close(); </script>"
?>