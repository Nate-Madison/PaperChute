<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Login</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/scroll.js"></script>
        <script type="text/javascript" src="js/loginValidation.js"></script>
    </head>
    <body>
        <header>
            <ul class="navbar" id="top">
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
            session_start();
            require_once("shorten/database.php");
            // Checks form and checks data from database
            $message = "";
            if (isset($_POST["sub"])) {
                if (userConfirm("password", "username")) {
                    $_SESSION["logged"] = true;
                    $_SESSION["user"] = hash("sha384", testInput($_POST["password"]) . testInput($_POST["username"]));
                    $_SESSION["username"] = testInput($_POST["username"]);
                    $message = "You have logged on successfully.";
                    header("Location: /profile.php");
                } else {
                    $message = "Either your username or password is wrong.";
                }
            }
            ?>
            <div class="form">
                <form method="post" action="" id="loginForm">
                    <fieldset>
                        <legend>Login Information</legend>
                        <input type="text" name="username" id="username" placeholder="Username" title="This field is required" /><br>
                        <input type="password" name="password" id="password" placeholder="Password" title="This field is required" /><br>
                        <button type="submit" name="sub" id="submit">Submit</button>
                        <button type="reset" name="res" id="reset">Reset</button><br>
                        <?php echo $message; ?>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>