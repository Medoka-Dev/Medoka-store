<?php

include "library.php";
include_once "DB_connect.php";
session_start();

if (isset($_POST["submit"])) {
    $email = $_POST["login-mail"];
    $password = $_POST["login-pass"];
    $account = get_account($conn, $email, $password);
    if ($account == null) {
        header("location: ../index.php?err=nouser");
    } else {
        $_SESSION["in"] = true;
        $_SESSION["uid"]=$account["user_id"];
        $_SESSION["username"] = $account["username"];
        if ($_POST["submit"] == "Get Started!!") {
            header("location: ../index.php?err=in");
        } else {
            header("location: ../store.php?err=in");
        }
    }
}
