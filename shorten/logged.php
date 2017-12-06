<?php
session_start();
require_once("database.php");

// Sets "selected" class for /login.php case
$site = $_SERVER["PHP_SELF"];

switch ($site) {
    case "/login.php":
        $loginClass = "class=\"selected\"";
        break;
    case "/createAccount.php":
        $createClass = "class=\"selected\"";
        break;
    case "/profile.php":
        $profileClass = "class=\"selected\"";
        break;
    case "/logout.php":
        $logClass = "class=\"selected\"";
        break;
}

// Checks if person is logged on their account
if (!$_SESSION["logged"]) {
    echo <<<HERE
<li>
    <a $loginClass href="login.php">Login</a>
</li>
<li>
    <a $createClass href="createAccount.php">Create Account</a>
</li>
HERE;
} else if ($_SESSION["logged"]) {
    echo "<li> <a $profileClass href=\"profile.php\">" . $_SESSION["username"] . "</a> </li>";
    echo "<li> <a $logClass href=\"logout.php\">Logout</a> </li>";
}
?>