<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
		
	$updateTransmission = new MoneyTransmission();
	
	$updateTransmission->SetId(htmlentities($_POST['id']));	
	$updateTransmission->SetSender(htmlentities($_POST['sender']));	
	$updateTransmission->SetReciever(htmlentities($_POST['reciever']));
	$updateTransmission->SetIncoming(htmlentities($_POST['incoming']));
	$updateTransmission->SetOutgoing(htmlentities($_POST['outgoing']));
	if($_POST['otherCurrency'] != "")
	{
		$updateTransmission->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$updateTransmission->SetCurrency(htmlentities($_POST['currency']));	
	}
	$updateTransmission->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$updateTransmission->SetEqualToDollar(htmlentities($_POST['equalToDollar']));
	$updateTransmission->SetTransmissionNo(htmlentities($_POST['transmissionNumber']));
	$updateTransmission->SetSenderLocation(htmlentities($_POST['senderLocation']));
	$updateTransmission->SetRecieverLocation(htmlentities($_POST['recieverLocation']));
	$updateTransmission->SetPassed(htmlentities($_POST['passed']));
	
	$updateTransmission->UpdateTransmission();
	echo "<script>	window.close(); </script>";
?>