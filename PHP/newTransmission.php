<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$newTransmission = new MoneyTransmission();
	
	$newTransmission->SetCompanyId(htmlentities($_POST['companyId']));
	$newTransmission->SetSender(htmlentities($_POST['sender']));
	$newTransmission->SetReciever(htmlentities($_POST['reciever']));
	$newTransmission->SetOutgoing(htmlentities($_POST['outgoing']));
	$newTransmission->SetIncoming(htmlentities($_POST['incoming']));
	if($_POST['otherCurrency'] != "")
	{
		$newTransmission->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$newTransmission->SetCurrency(htmlentities($_POST['currency']));	
	}
	$newTransmission->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$newTransmission->SetEqualToDollar(htmlentities($_POST['equalToDollar']));
	$newTransmission->SetTransmissionNo(htmlentities($_POST['transmissionNumber']));
	$newTransmission->SetSenderLocation(htmlentities($_POST['senderLocation']));
	$newTransmission->SetRecieverLocation(htmlentities($_POST['recieverLocation']));
	$newTransmission->SetPassed(htmlentities($_POST['passed']));
	
	$newTransmission->NewTransmission();
	echo "<script> window.close(); </script>";
?>