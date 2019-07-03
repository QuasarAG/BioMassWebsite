<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "biomass";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

if (!$conn)
{
	die("Connection Failed:".mysqli_connect_error());
}