<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$user = new Users();
	
	$user->SetName(htmlentities($_POST['name']));
	$user->SetGroup(htmlentities($_POST['userType']));
	$user->SetPassword(password_hash(htmlentities($_POST['password']), PASSWORD_DEFAULT));
	
	$user->NewUser();
	header("location: ../frontend/users.php");
?>