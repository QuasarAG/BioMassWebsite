<?php

/*The isset () function is used to check whether a variable is set or not
The isset() function return false if testing variable contains a NULL value. 
*/

//User can only access these function if he clicked signup button
if (isset($_POST["signup-submit"]))
{
	require 'dbh.inc.php';

	$username = $_POST['nameUsers'];
	$email = $_POST['mailUsers'];
	$password = $_POST['pwdUsers'];
	$passwordRepeat = $_POST['pwd-repeat'];


	//Check if Empty field
	if (empty($username) || empty($email) ||
		empty($password) || empty($passwordRepeat))
	{
		//reload the page while keeping some information
		header("Location: ../html/signup.php?error=emptyfields&nameUsers=".$username."&mailUsers=".$email);
		exit();
	}
	//Check Email Validity && correct username
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) &&
		!preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../html/signup.php?error=invalidmailname");
		exit();
	}
	//Check Email Validity
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../html/signup.php?error=invalidmail&nameUsers=".$username);
		exit();
	}
	//Check if username dont have unauthorized character
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../html/signup.php?error=invalidname&mailUsers=".$email);
		exit();
	}
	//Check if both password match
	else if ($password !== $passwordRepeat)
	{
		header("Location: ../html/signup.php?error=passwordcheck&nameUsers=".$username."&mailUsers=".$email);
		exit();
	}
	else 
	{
		//Prepared statement
		$sql = "SELECT nameUsers FROM users WHERE nameUsers=?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../html/signup.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt,"s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck > 0) //Check if username is alreadyTaken
			{
				header("Location: ../html/signup.php?error=usertaken&mailUsers=".$email);
				exit();
			}
			else // if everything went right insert userData into table
			{
				$sql = "INSERT INTO users (nameUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql))
				{
					header("Location: ../html/signup.php?error=sqlerror");
					exit();
				}
				else
				{
					//Hash password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt,"sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);

					//SUCCESS ------------------------------------------------
					header("Location: ../html/signup.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_stmt_close($conn);
}
else 
{
	header("Location: ../html/signup.php");
	exit();
}

