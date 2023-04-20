<?php
include "library.php";
include_once "DB_connect.php";
if (isset($_POST["submit"])) {
    $email = $_POST["register-mail"];
    $username = $_POST["register-username"];
    $password = $_POST["register-password"];
    if (unameExists($conn, $username, $email) == false) {
        add_user($conn, $username, $email, $password);
        header("location: ../index.php?err=done");
        exit;
    } else {
        header("location: ../index.php?err=uexist");
        exit;
    }
}
header("location: ../index.php");
