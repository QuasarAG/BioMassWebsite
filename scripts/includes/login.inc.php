<?php

if (isset($_POST["login-submit"]))
{
	require 'dbh.inc.php';
	
	$username = $_POST['username'];
	$password = $_POST['pwdUsers'];
	

	if (empty($username) || empty($password)) 
	{
		header("Location: ../html/home.php?error=emptyfields");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE nameUsers=?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../html/home.php?error=sqlerror");
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
					header("Location: ../html/home.php?error=wrongpwd");
					exit();
				}
				//if successfully logged in START A SESSION
				else if($pwdCheck == true)
				{
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userNameId '] = $row['nameUsers'];

					header("Location: ../html/home.php?login=success");
					exit();
				}
				else
				{
					header("Location: ../html/home.php?error=wrongpwd");
					exit();
				}
			}
			else
			{
				header("Location: ../html/home.php?error=nouser");
				exit();
			}
		}
	}

}
else
{
	header("Location: ../html/home.php");
	exit();
}