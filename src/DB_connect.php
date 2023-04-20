<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "MedokaDB";

$conn = mysqli_connect($servername, $username, $password,$DBname);
if ( mysqli_connect_errno() ) {
	echo('Failed to connect to MySQL: ' . mysqli_connect_error());
}
