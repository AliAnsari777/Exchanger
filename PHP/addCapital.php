<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$capital = new Capital();
	
	$capital->SetMoney(htmlentities($_POST['money']));
	if($_POST['otherCurrency'] != "")
	{
		$updateCapital->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$capital->SetCurrency(htmlentities($_POST['currency']));	
	}
	$capital->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$capital->SetEqualToDollar(htmlentities($_POST['equalToDollar']));

	$capital->AddCapital();
	echo "<script> window.close(); </script>";

?>