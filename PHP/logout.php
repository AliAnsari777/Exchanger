<?php
	
	//There should be password for root user. Blank password will not work.
	$mysqlPath="C:\\wamp\\bin\\mysql\\mysql5.6.17\\bin\\";
	$command = $mysqlPath . "mysqldump.exe exchanges > D:\\backup\\exchange_" . date("Y-m-d") . ".sql --user=root --password=pass123* ";
	system($command);
	
	session_start();
	unset($_SESSION);
	session_destroy();
	header('Location: ../index.html');
	exit;
?>