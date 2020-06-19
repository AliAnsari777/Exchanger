<?php
	session_start();
	if(!isset($_SESSION['userId']))
		header('location: ../index.html');
		
	require_once "classes.php";
	
	$updateCapital = new Capital();
	$updateCapital->SetMoney(htmlentities($_POST['money']));
	if($_POST['otherCurrency'] != "")
	{
		$updateCapital->SetCurrency(htmlentities($_POST['otherCurrency']));	
	}
	else
	{
		$updateCapital->SetCurrency(htmlentities($_POST['currency']));	
	}
	$updateCapital->SetExchangeRate(htmlentities($_POST['exchangeRate']));
	$updateCapital->SetEqualToDollar(htmlentities($_POST['equalToDollar']));
	$updateCapital->SetId(htmlentities($_POST['id']));
	
	echo var_dump($updateCapital);
	$updateCapital->UpdateCapital();
	echo "<script>	window.close(); </script>";
?>