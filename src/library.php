<?php

function unameExists($conn, $username, $email)
{
    $stmt = $conn->prepare("SELECT * FROM users where username = ? OR email = ?;");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}
function add_user($conn, $username, $email, $pwd)
{
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?);");
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt->bind_param("sss", $username, $hashed_pwd, $email);
    $stmt->execute();
    $stmt->close();
}

function get_account($conn, $email, $password)
{
    $stmt = $conn->prepare("SELECT * FROM users where email = ?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $row=[];
    $stmt->bind_result($row["user_id"],$row["username"],$row["password"],$row["email"]);
    if ($stmt->fetch()) {
        $stmt->close();
        if (password_verify($password,$row["password"])) {
            return $row;
        } else {
            return null;
        }
    } else {
        $stmt->close();
        return null;
    }
}
