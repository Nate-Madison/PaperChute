<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Home</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
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
                <?php
                // removes session variables to log you out
                session_start();
                session_destroy();
                require_once("shorten/logged.php"); 
                ?>
            </ul>
        </header>
        <div class="content">
            <div class="banner">
                <h1>PaperChute</h1>
                <span>Your Source for Paper</span>
            </div>
        
            <div class="form">
                <h2>You Have Been Successfully Logged Out.</h2>
                <a href="index.php"><h2>Go Back?</h2></a>
            </div>
        </div>
        
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>