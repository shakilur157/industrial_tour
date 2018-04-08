<?php
function connection()
{
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "tour";

	$db = new mysqli($servername, $username, $password, $dbname);
	return $db;
}
?>