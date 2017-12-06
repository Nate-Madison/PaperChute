<?php
session_start();
$db = new mysqli(getenv("IP"), getenv("C9_USER"), "", "c9", 3306);

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function userConfirm ($password, $username) {
    // use the name of the $_POST for the confirmation
    global $db;
    if ($username === $_SESSION["username"]) {
        $user = hash("sha384", testInput($_POST[$password]) . $_SESSION["username"]);
        $userQuery = mysqli_fetch_assoc($db->query("SELECT user FROM Customer WHERE user=\"$user\";"));
        if ($userQuery["user"] === $user) {
            $logged = true;
        } else {
            $logged = false;
        }
    } else if ($_SESSION["username"] !== $username) {
        $user = hash("sha384", testInput($_POST[$password]) . testInput($_POST[$username]));
        $userQuery = mysqli_fetch_assoc($db->query("SELECT user FROM Customer WHERE user=\"$user\";"));
        if ($userQuery["user"] === $user) {
            $logged = true;
        } else {
            $logged = false;
        }
    }
    return $logged;
}
?>