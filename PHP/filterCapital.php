<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$filterCapital = new Capital();
	$filterCapital->SetStartDate(htmlentities($_POST['startDate']));
	$filterCapital->SetEndDate(htmlentities($_POST['endDate']));
	$filterCapital->DailyCapitalReport();
?>