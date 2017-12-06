<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Profile</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/passValidation.js"></script>
    </head>
    <body>
        <header>
            <ul class="navbar">
                <li>
                    <a class="navitem" href="index.php">PaperChute</a>
                </li>
                <li>
                    <a class="navitem" href="index.php">Home</a>
                </li>
                <li>
                    <a class="navitem" href="aboutUs.php">About Us</a>
                </li>
                <li>
                    <a class="navitem" href="products.php">Products</a>
                </li>
                <li>
                    <a class="navitem" href="order.php">Order</a>
                </li>
                <li>
                    <a class="navitem" href="checkout.php">Checkout</a>
                </li>
            </ul>
            
            <ul class="logCreate">
                <?php require_once("shorten/logged.php"); ?>
            </ul>
        </header>
        <div class="content">
            <div class="banner">
                <h1>PaperChute</h1>
                <span>Your Source for Paper</span>
            </div>
            
            <?php
            require_once("shorten/database.php");
            
            if (!$_SESSION["logged"]) {
                header("Location: /login.php");
            } else if ($_SESSION["logged"]) {
                $userQuery = $db->query("SELECT firstName, lastName, email, user FROM Customer WHERE user=\"" . $_SESSION["user"] . "\";");
                $row = mysqli_fetch_assoc($userQuery);
                
                echo <<<HERE
<h2>Profile</h2>
<div id="accordion">
    <h3>Profile Information</h3>
    <div>
HERE;
                echo "<p>Name: " . $row["firstName"] . " " . $row["lastName"] . "</p>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo "<p>Username: " . $_SESSION["username"] . "</p>";
                echo <<<HERE
    </div>
    
    <h3>Change Credentials</h3>
    <div class="form">
        <form id="change" method="post" action="">
            <fieldset>
                <legend>Change Password</legend>
                <input title="This field is required" type="password" name="currentPass" id="currentPass" placeholder="Current Password"><br>
                <input title="This field is required" type="password" name="currentCheck" id="currentCheck" placeholder="Current Password Again"><br>
                <input title="This field is required" type="password" name="newPass" id="newPass" placeholder="New Password"><br>
                <button type="submit" name="sub" id="submit">Submit</button>
                <button type="reset">Reset</button><br>
HERE;
                $current = $new = "";
                if (isset($_POST["sub"])) {
                    $current = hash("sha384", testInput($_POST["currentPass"]) . $_SESSION["username"]);
                    $check =  hash("sha384", testInput($_POST["currentCheck"]) . $_SESSION["username"]);
                    $new = hash("sha384", testInput($_POST["newPass"]) . $_SESSION["username"]);
                    
                    if ($row["user"] === $current &&  $row["user"] === $check) {
                        $updateQuery = $db->query("UPDATE Customer SET user=\"$new\" WHERE user=\"" . $row["user"] . "\";");
                    
                        echo "Successfully changed password.";
                    } else {
                        echo "The current password is incorrect.";
                    }
                }
                echo "</fieldset> </form> </div>";
                echo <<<HERE
    <h3>Delete Account</h3>
    <div class="form">
        <form id="delete" method="post" action="">
            <fieldset>
                <legend>Delete Account</legend>
                <input title="This field is required" type="password" name="delPass" id="delPass" placeholder="Password" /><br />
                Are you sure?  <input type="checkbox" name="checker" /><br />
                <button type="submit" name="del">Submit</button><br />
HERE;
                $delPass = testInput($_POST["delPass"]);
                
                if (isset($_POST["del"]) && isset($_POST["checker"])) {
                    if (!empty($delPass)) {
                        if (userConfirm("delPass", $_SESSION["username"])) {
                            $delQuery = $db->query("DELETE FROM Customer WHERE user=\"" . hash("sha384", $delPass . $_SESSION["username"]) . "\";");
                            header("Location: /logout.php");
                        } else {
                            echo "Your password is incorrect.";
                        }
                    } else {
                        echo "You have not fully filled in the form.";
                    }
                } else {
                    echo "Are you sure?";
                }
                
                echo "</fieldset></form></div>";
                echo "</div>";
            }
            ?>
        </div>
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>