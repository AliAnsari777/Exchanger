<?php

// create connection to database
$connection = new mysqli("localhost", "root", "pass123*", "exchanges");

// seting the character set of database connectivity.
$connection->set_charset("utf8");

// check for connection errors
if($connection->connect_error)
{
	die("Connection failed: ". $connection->connect_error);
}

?>