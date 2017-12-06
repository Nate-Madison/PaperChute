<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Order</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/orderValidation.js"></script>
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
                    <a class="navitem selected" href="order.php">Order</a>
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
            
            if (!$_SESSION["logged"]) {
                header("Location: /login.php");
            } else  if ($_SESSION["logged"]){
                $userQuery = $db->query("SELECT firstName, lastName, address, email, user FROM Customer WHERE user=\"" . $_SESSION["user"] . "\";");
                $row = mysqli_fetch_assoc($userQuery);
                    
                echo <<<HERE
<div class="form">
    <h2>Order</h2>
HERE;
                echo "<p>Name: " . $row["firstName"] . " " . $row["lastName"] . "</p>";
                echo "<p>Address: " . $row["address"] . "</p>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo <<<HERE
    <h2>Product</h2>
    <form method="post" action="" id="orderForm">
        <select name="product">
HERE;
                $productQuery = $db->query("SELECT name FROM Product;");
                while ($productRow = mysqli_fetch_assoc($productQuery)) {
                    echo "<option value=\"" . $productRow["name"] . "\">" . $productRow["name"] . "</option>";
                }
                echo "</select>";
                
                $product = $quantity = $password = $shipping = "";
                
                if ($_SERVER["REQUEST_METHOD"] = "POST") {
                    $product = testInput($_POST["product"]);
                    $quantity = testInput($_POST["quantity"]);
                    $password = hash("sha384", testInput($_POST["password"]) . $_SESSION["username"]);
                    $shipping = testInput($_POST["shipping"]);
                }
                
                echo <<<HERE
        <input type="text" name="quantity" placeholder="Quantity" id="quantity" title="This field is required" />
        <input type="text" name="shipping" placeholder="Shipping-Address" id="shipping" title="This field is required" />
        <input type="password" name="password" placeholder="Password" id="password" title="This field is required" />
        <button type="submit" name="sub">Submit</button>
        <button type="reset">Reset</button>
    </form>
HERE;
                if (isset($_POST["sub"])) {
                    if (empty($product) || empty($quantity) || empty($password) || empty($shipping)) {
                        echo "You have not fully filled in the form.";
                    } else if ($row["user"] === $password) {
                        $prodQuery = $db->query("SELECT weight FROM Product WHERE name=\"$product\"");
                        $prodRow = mysqli_fetch_assoc($prodQuery);
                        
                        $orderQuery = $db->query("INSERT INTO PaperOrder (firstName, lastName, email, productName, quantity, weight, shipping, user) VALUES (\"" . $row["firstName"] . "\", \"" . $row["lastName"] . "\",\"" . $row["email"] . "\", \"$product\", \"$quantity\", \"" . $prodRow["weight"] . "\",\"$shipping\",\"" . $_SESSION["user"] . "\");");
                        echo "Your order has been made.";
                    } else {
                        echo "You password is incorrect.";
                    }
                }
            }
            echo "</div>";
            ?>
            
        </div>
       <?php require_once("shorten/footer.php"); ?>
    </body>
</html>