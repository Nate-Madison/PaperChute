<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | Home</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet" />
        
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
                    <a class="navitem selected" href="index.php">Home</a>
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
            
            <div class="inside-content">
                <h2>Actual Location</h2>
                <p>Unfortunately for customers that want a real location, we do not have an actual store. (but we do have a warehouse) However, you are not completely out of luck because you can always get the items delivered to your location instead. Just <a href="createAccount.php">create an account</a>, <a href="login.php">login</a>, then <a href="order.php">order</a> and <a href="checkout.php">checkout</a> and blam, your items are delivered in the next few business days.</p>
            </div>
            
            <div class="inside-content">
                <h2>Welcome!</h2>
                <p>Hello and welcome to PaperChute! We are experienced in the process of making and delivering office products to our customers. We have multiple pages for the use of our customers. There is the <a href=”products.php”>products page</a> which you can use to search for our products. Our products are typical office supplies which are always needed by any company (including us!) for their employees to complete their work and process information inside the company. Our website is designed for the customer to use our website with a back-end to suit. Our company understands that the front-end of our website is not the greatest, but we focused on making the back-end functional compared to making a website that has good looks.</p>
            </div>
            
            <div class="inside-content">
                <h2>Reviews</h2>
                <p>Please send in reviews to our email <a href=”#”>reviews@paperchute.com </a>. We need some reviews so we can update our site!</p>
            </div>
            
            <div class="inside-content">
                <h2>Accounts</h2>
                <p>You need to make an account to be able to access the <a href=”order.php”>order page</a> and the <a href=”checkout.php”>checkout page</a>. Don’t worry though, you can always <a href=”createAccount.php”>create an account</a> whenever you need to. After you create an account, simply go to the <a href=”login.php”>login page</a> to login into your newly made account. Once you have logged in, you will automatically be sent to the <a href=”profile.php”>profile page</a> so you can view your information or delete your account from our database.</p>
            </div>
        </div>
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>