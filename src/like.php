<?php
session_start();
echo "cool";
if (isset($_POST["gid"])){
    $stmt = $conn->prepare("INSERT INTO lokes (user_id,game_id) VALUES (?,?);");
    $stmt->bind_param("sss", $_SESSION["uid"], $_POST["gid"]);
    $stmt->execute();
    $stmt->close();
}
exit;