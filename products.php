<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Products</title>
        
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
                    <a class="navitem selected" href="products.php">Products</a>
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
        
            <div class="form">
                <h2>Search for Products</h2>
                <form method="get" action="">
                    <input type="text" name="search" placeholder="Name of Product"/>
                    <button type="submit" name="sub">Submit</button>
                </form>
            </div>
            <?php
            // Here comes the php, heh
            $search = "";
            
            // Create connection
            require_once("shorten/database.php");
            
            // Test connection
            if ($db->connect_error) {
                die("Connection Failed" . $db->connect_error);
            }
            
            // Clean search data
            if ($_SERVER["REQUEST_METHOD"] = "GET") {
                $search = testInput($_GET["search"]);
            }
            
            // Search for data
            $userQuery = $db->query("SELECT name, stock, weight, pricePerItem, salesTax FROM Product WHERE name LIKE \"%$search%\";");
            $nameQuery = $db->query("SELECT name, stock, weight, pricePerItem, salesTax FROM Product WHERE name LIKE \"%$search%\";");
            
            // Display data
            if ($_SERVER["REQUEST_METHOD"] = "GET" && isset($_GET["sub"])) {
                if (!empty(mysqli_fetch_array($nameQuery)) && !empty($search)) {
                    echo <<<HERE
<div class="tableContent">
    <table>
HERE;
                    while ($row = mysqli_fetch_assoc($userQuery)) {
                        echo "<tr><td>" . $row["name"] . "</td> <td class=\"next\">" . $row["weight"] . "</td> <td class=\"next\">" . "$" . number_format($row["pricePerItem"], 2) . "</td> </tr>";
                    }
                    echo "</table> </div>";
                } else {
                    echo "Your searched item could not be found.";
                }
            }
            ?>
        </div>
        
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>