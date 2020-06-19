<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
	
	if(isset($_GET['id']))
	{
		$userId = htmlentities($_GET['id']);
	}
	
	if($userId == $_SESSION['userId'])
	{
		echo "<script type='text/javascript'> alert('This is your current user you can not delete it!!!'); window.close(); </script>";
	}
	else
	{
		require_once "classes.php";
		
		$deleteClient = new Users();
		$deleteClient->SetUserId($userId);
		$deleteClient->DeleteUser();
		
		echo "<script> 	window.close(); </script>";
	}
?>