<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Checkout</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/scroll.js"></script>
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
                    <a class="navitem selected" href="checkout.php">Checkout</a>
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
            
            if (!$_SESSION["logged"]) {
                header("Location: /login.php");
            } else if ($_SESSION["logged"]) {
                $testQuery = $db->query("SELECT productName, quantity, weight, shipping FROM PaperOrder WHERE user=\"" . $_SESSION["user"] . "\";");
                if (!empty(mysqli_fetch_assoc($testQuery))) {
                    $userQuery = $db->query("SELECT OrderID, productName, quantity, weight, shipping FROM PaperOrder WHERE user=\"" . $_SESSION["user"] . "\";");
                    
                    echo <<<HERE
<div class="form checkout">
    <form method="post" action="">
        <table>
HERE;
                    while ($userRow = mysqli_fetch_array($userQuery)) {
                        $productQuery = mysqli_fetch_array($db->query("SELECT pricePerItem FROM Product WHERE name=\"$userRow[1]\";"));
                        $price = "\$" . number_format($userRow[2] * $productQuery[0], 2);
                        echo <<<HERE
            <tr>
                <td><input type="checkbox" name="ID$userRow[0]"/></td>
                <td>$userRow[1]</td>
                <td>$userRow[2]</td>
                <td>$userRow[3]</td>
                <td>$userRow[4]</td>
                <td>$price</td>
            </tr>
HERE;
                    }
                    echo "</table>";
                    echo "<button type=\"submit\" name=\"sub\">Submit</button><br />";
                    echo "</form></div>";
                } else {
                    echo <<<HERE
<div class="form">
    <h2>Whoa!</h2>
    <h2>You have no orders at all! However, you still can make <a href="order.php">orders</a>.</h2>
</div>
HERE;
                }
                
                if (isset($_POST["sub"])) {
                    $idQuery = mysqli_fetch_array($db->query("SELECT OrderID FROM PaperOrder"));
                    for ($item = 0; $item <= count($idQuery); $item++) {
                        if (isset($_POST["ID$item"])) {
                            $orderQuery = mysqli_fetch_array($db->query("SELECT * FROM PaperOrder WHERE OrderID=\"$item\";"));
                            $deliveryQuery = $db->query("INSERT INTO Delivery (firstName, lastName, email, productName, quantity, weight, shipping, price, employee, confirmed) VALUES (\"$orderQuery[1]\", \"$orderQuery[2]\", \"$orderQuery[3]\", \"$orderQuery[4]\", \"$orderQuery[5]\", \"$orderQuery[6]\", \"$orderQuery[7]\"," . ", \"true\", \"" . $_SESSION["user"] . "\");");
                            echo "INSERT INTO Delivery (firstName, lastName, email, productName, quantity, weight, shipping, price, employee, confirmed) VALUES (\"$orderQuery[1]\", \"$orderQuery[2]\", \"$orderQuery[3]\", \"$orderQuery[4]\", \"$orderQuery[5]\", \"$orderQuery[6]\", \"$orderQuery[7]\"," . ", \"true\", \"" . $_SESSION["user"] . "\");";
                        }
                    }
                }
            }
            ?>
        </div>
       <?php require_once("shorten/footer.php"); ?>
    </body>
</html>