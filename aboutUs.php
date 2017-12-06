<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>PaperChute | About Us</title>
        
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
                    <a class="navitem selected" href="aboutUs.php">About Us</a>
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
             <div class="banner-about">
                <img type="image/svg+xml" src="images/logo.svg" alt="Company Logo" />
             </div>
            
            <div class="inside-content">
                <h2>Employee Experiences</h2>
                <p><em>”I have thoroughly enjoyed working at PaperChute, my employers have given me a good job with good pay to continue living a life. I can say for myself that the products are high quality since I am one of the employees that delivers the products to our customers. We almost always have more than one order from a customer. Sometimes I am also the one to pick-up items from the people that we buy them from.”</em> -Reschanskov Ivanov</p>
                <p><em>“I don’t think I've found such an efficient and loving work environment, as I have come to find at PaperChute. It's so great to know that we are helping and supplying all the people out there with our top of the line products.”</em> -Emily Redford </p>
            </div>
            
            <div class="inside-content">
                <h2>About Us</h2>
                <p>We are a company founded in Jackson TN and we sell paper. All deliveries are handled by our own company. We have a standard of quality for our service and our products sold. Even though we may not have any reviews, we do have some employee experiences. Almost all of our employee experiences are saying that they enjoy working at our current company. Since that is the case, we try our hardest to continue these experiences for our current or new employees and customers.</p>
            </div>
            
            <div class="inside-content">
                <h2>Reviews</h2>
                <p>Again, we have no reviews so please send in your reviews to <a href=”#”>reviews@paperchute.com</a>. We need some reviews for us to make a new page to see your reviews!</p>
            </div>
        </div>
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>