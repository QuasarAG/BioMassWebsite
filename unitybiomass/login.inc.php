<?php


require 'dbh.inc.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) 
{
	echo "1: empty log data"; 
	exit();
}
else
{
	$sql = "SELECT * FROM users WHERE nameUsers=?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql))
	{
		echo "2: SQL error"; 
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

			//Check if $result found something in the database
		if ($row = mysqli_fetch_assoc($result)) 
		{
				//Check if password is correct
			$pwdCheck = password_verify($password, $row['pwdUsers']);

			if ($pwdCheck == false)
			{
				echo "2: wrongPassword"; 
				exit();
			}
			//if successfully logged in START A SESSION
			else if($pwdCheck == true)
			{
				echo("0"); //No error query
				exit();
			}
			else
			{
				echo "2: wrongPassword"; 
				exit();
			}	
		}
		else
		{
			echo "3: No user"; 
			exit();
		}
	}
}