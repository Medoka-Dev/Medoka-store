<?php
include_once 'DB_connect.php';
include_once 'library.php';
session_start();
if (isset($_GET["gid"])) {
    if (is_loved($conn, $_GET["gid"], $_SESSION["uid"])) {
        $stmt = $conn->prepare("delete from likes where user_id=? and game_id=?");
        $stmt->bind_param("ss", $_SESSION["uid"], $_GET["gid"]);
        $stmt->execute();
        $stmt->close();
        echo'unliked';
    } else {
        $stmt = $conn->prepare("INSERT INTO likes (user_id,game_id) VALUES (?,?);");
        $stmt->bind_param("ss", $_SESSION["uid"], $_GET["gid"]);
        $stmt->execute();
        $stmt->close();
        echo'liked';
    }
}
exit;
