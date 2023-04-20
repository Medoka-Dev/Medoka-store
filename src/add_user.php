<?php
include "library.php";
include_once "DB_connect.php";
if (isset($_POST["submit"])) {
    $email = $_POST["register-mail"];
    $username = $_POST["register-username"];
    $password = $_POST["register-password"];
    if (unameExists($conn, $username, $email) == false) {
        add_user($conn, $username, $email, $password);
    } else {
        header("./index.php?err=uexist");
        exit;
    }
}
header("./index.php");
