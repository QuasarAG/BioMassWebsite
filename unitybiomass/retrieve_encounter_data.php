<?php

require 'dbh.inc.php';

// if (empty($bossID) || empty($duration) ||
// 	empty($build) || empty($username)) 
// {
// 	echo "1: empty log data"; 
// 	exit();
// }
// else
// {

//Query userID  so current data get related to current player in database
$sql = "SELECT duration, build FROM completed_encounter_data WHERE MIN(duration) AND bossID = 0";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql))
{
	echo "2: SQL error"; 
	exit();
}
else
{
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	//Check if $result found something in the database
	if ($row = mysqli_fetch_assoc($result)) 
	{
		echo "FOUND!"; 
	}
	else
	{
		echo "3: No data"; 
		exit();
	}
}


// }