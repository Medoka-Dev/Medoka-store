<?php

include "library.php";
include_once "DB_connect.php";
session_start();

if (isset($_POST["submit"])) {
$email = $_POST["login-mail"];
$password = $_POST["login-pass"];
$account = get_account($conn, $email, $password);
if ($account == null) {
// header("location: ../index.php?err=nouser");
} else {
$_SESSION["in"] = true;
$_SESSION["username"] = $account["username"];
header("location: ../index.php?err=in");
}
}
header("location: ../index.php");
