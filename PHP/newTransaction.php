<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$newTransaction = new Transactions;

	$newTransaction->SetUserId(htmlentities($_POST['userId']));
	$newTransaction->SetId(htmlentities($_POST['clientId']));	
	$newTransaction->SetIncoming(htmlentities($_POST['incoming']));
	$newTransaction->SetOutgoing(htmlentities($_POST['outgoing']));
	if($_POST['otherCurrency'] != "")
	{
		$newTransaction->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$newTransaction->SetCurrency(htmlentities($_POST['currency']));	
	}
	$newTransaction->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$newTransaction->SetEqualToDollar(htmlentities($_POST['equalToDollar']));
	$newTransaction->SetNote(htmlentities($_POST['note']));
	
	$newTransaction->NewTransaction();
	echo "<script> window.close(); </script>";
?>