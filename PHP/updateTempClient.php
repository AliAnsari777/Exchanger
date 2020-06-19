<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once("classes.php");
	
	$updateTempClient = new TemporaryClients();
	
	$updateTempClient->SetId(htmlentities($_POST['id']));
	$updateTempClient->SetName(htmlentities($_POST['name']));
	$updateTempClient->SetIncoming(htmlentities($_POST['incoming']));
	$updateTempClient->SetOutgoing(htmlentities($_POST['outgoing']));
	if($_POST['otherCurrency'] != "")
	{
		$updateTempClient->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$updateTempClient->SetCurrency(htmlentities($_POST['currency']));	
	}
	$updateTempClient->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$updateTempClient->SetEqualToDollar(htmlentities($_POST['equalToDollar']));
	$updateTempClient->SetNote(htmlentities($_POST['note']));
	
	
	$updateTempClient->UpdateTempClient();
	echo "<script>	window.close(); </script>";
?>