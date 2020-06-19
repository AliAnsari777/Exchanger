<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	include "classes.php";
	
	$Tempclient = new TemporaryClients();
	
	$Tempclient->SetName(htmlentities($_POST['name']));
	$Tempclient->SetIncoming(htmlentities($_POST['incoming']));
	$Tempclient->SetOutgoing(htmlentities($_POST['outgoing']));
	if($_POST['otherCurrency'] != "")
	{
		$Tempclient->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$Tempclient->SetCurrency(htmlentities($_POST['currency']));	
	}
	$Tempclient->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$Tempclient->SetEqualToDollar(htmlentities($_POST['equalToDollar']));
	$Tempclient->SetNote(htmlentities($_POST['note']));
	$Tempclient->SetUserId(htmlentities($_SESSION['userId'])); // this is user id which seted in session in login process.
	
	$Tempclient->NewTempClient();
	
	echo "<script>	window.close(); </script>";
?>