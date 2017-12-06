<?php
session_start();
require_once("database.php");

$footerQuery = $db->query("SELECT firstName, lastName FROM Customer WHERE user=\"" . $_SESSION["user"] . "\";");

if (!$_SESSION["logged"]) {
    echo <<<HERE
<footer>
    <ul class="footerBar">
        <li>
            <p>&copy;2017 PaperChute</p>
        </li>
        <li>
            <a href="login.php"><p>Login</p></a>
        </li>
        <li>
            <a href="createAccount.php"><p>Create Account</p></a>
        </li>
        <li>
            <a href="#top"><p>Back to Top »</p><a/>
        </li>
    </ul>
</footer>
HERE;
} else {
    echo <<<HERE
<footer>
    <ul class="footerBar">
        <li>
            <p>&copy;2017 PaperChute</p>
        </li>
HERE;
    echo "<li><a href=\"profile.php\"><p>" . $_SESSION["username"] . "</p></a>";
    echo "<li><a href=\"logout.php\"><p>Logout</p></a>";
    echo "<li><a href=\"#top\"><p>Back to Top &#187;</p></a>";
    echo "</ul></footer>";
}

mysqli_close($db);
?>