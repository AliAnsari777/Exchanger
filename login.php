<?php
	session_start();
	include "PHP/classes.php";
	
	if(file_exists("C:\\Windows\\System32\\Sys.dll"))
	{
		if(!file_exists("C:\\Windows\\System32\\Drivers\\demo.php"))
		{
			$address = "C:\\Windows\\System32\\Drivers\\demo.php";
			$handle = fopen($address, "w") or die("file can't create");
			$value = time() + 10 * 24 * 60 * 60;
			fwrite($handle, $value);
			fclose($handle);
			
			$user = new Users();
			
			$user->SetName(htmlentities($_POST['name']));
			$user->SetPassword(htmlentities($_POST['password']));
			// if user could login successfuly its 'id' will be save in classes.php in users class
			// and in here we save it in session to use it in creating new client or new tronsactions.
			if($user->Login() == true)
			{
				$_SESSION['userId']=$user->GetUserId();
				$_SESSION['groups']=$user->GetGroup();
			}
		}
		else
		{	
			$address = "C:\\Windows\\System32\\Drivers\\demo.php";
			$handle = fopen($address, "r");
			$contents = fgets($handle);
			fclose($handle);
			$contents = date("Y/m/d", $contents);
			
			if($contents < date("Y/m/d"))
			{
				header("location: registration.php");	
			}
			else
			{
				$user = new Users();
				
				$user->SetName(htmlentities($_POST['name']));
				$user->SetPassword(htmlentities($_POST['password']));
				// if user could login successfuly its 'id' will be save in classes.php in users class
				// and in here we save it in session to use it in creating new client or new tronsactions.
				if($user->Login() == true)
				{
					$_SESSION['userId']=$user->GetUserId();
					$_SESSION['groups']=$user->GetGroup();
				}
			}
		}
	}
	else
	{
		header("location: illegalCopy.php");	
	}
?>