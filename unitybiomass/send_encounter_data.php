<?php

require 'dbh.inc.php';

$bossID = $_POST['bossID'];
$duration = $_POST['duration'];
$build = $_POST['build'];
$username = $_POST['username'];

$ownerUserID=0;

// if (empty($bossID) || empty($duration) ||
// 	empty($build) || empty($username)) 
// {
// 	echo "1: empty log data"; 
// 	exit();
// }
// else
// {

//Query userID  so current data get related to current player in database
$sql = "SELECT idUsers FROM users WHERE nameUsers=?";
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
		$ownerUserID = $row['idUsers'];
	}
	else
	{
		echo "3: No user"; 
		exit();
	}
}




$sql = "INSERT INTO completed_encounter_data (bossID, duration, build, ownerUserID) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql))
{
	echo "2: SQL error"; 
	exit();
}
else
{
	mysqli_stmt_bind_param($stmt, "iisi", $bossID, $duration, $build, $ownerUserID);
	mysqli_stmt_execute($stmt);

	echo "0"; //No error query
	exit();
}



// }