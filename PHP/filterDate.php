<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$dateFilter = new Capital();
	$dateFilter->SetFilterDate(htmlentities($_POST['filterDate']));
	$dateFilter->filterDate();

?>