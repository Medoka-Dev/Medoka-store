<?php
$servername = "localhost";
$username = "username";
$password = "";
$DBname = "MedokaDB";

$conn = new mysqli($servername, $username, $password,$DBname);

if (!$conn){
    die("Connetion failed: ".mysqli_connect_error());
}
