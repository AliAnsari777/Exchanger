<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
		
	$updateTransaction = new Transactions();
	
	$updateTransaction->SetId(htmlentities($_POST['id']));
	$updateTransaction->SetIncoming(htmlentities($_POST['income']));
	$updateTransaction->SetOutgoing(htmlentities($_POST['outgo']));
		if($_POST['otherCurrency'] != "")
	{
		$updateTransaction->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$updateTransaction->SetCurrency(htmlentities($_POST['currency']));	
	}
	$updateTransaction->SetExchangeRate(htmlentities($_POST['rate']));
	$updateTransaction->SetEqualToDollar(htmlentities($_POST['to_dollar']));
	$updateTransaction->SetNote(htmlentities($_POST['note']));
	
	$updateTransaction->UpdateTransaction();
	echo "<script>	window.close(); </script>";
?>