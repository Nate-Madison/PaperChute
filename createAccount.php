<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PaperChute | Create</title>
        
        <link rel="icon" href="images/logo.svg" type="image/svg+xml" />
        <link rel="stylesheet" href="css/normalize.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/scroll.js"></script>
        <script type="text/javascript" src="js/accountCreation.js"></script>
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
            
            // Create Connection
            require_once("shorten/database.php");
            
            // Test Connection
            if ($db->connect_error) {
                echo "Connection Failed: " . $db->connect_error;
            }
            
            // Gets Information Sanitized
            $firstName = $lastName = $age = $gender = $email = $address = $phoneNumber = $affliation = $username = $password = "";
            
            if ($_SERVER["REQUEST_METHOD"] = "POST") {
                $firstName = testInput($_POST["firstName"]);
                $lastName = testInput($_POST["lastName"]);
                $age = testInput($_POST["age"]);
                $gender = testInput($_POST["gender"]);
                $email = testInput($_POST["email"]);
                $address = testInput($_POST["address"]);
                $phoneNumber = testInput($_POST["phoneNumber"]);
                $affliation = testInput($_POST["affliation"]);
                $user = hash("sha384", testInput($_POST["password"]) . testInput($_POST["username"]));
                $verify = hash("sha384", testInput($_POST["verify"]) . testInput($_POST["username"]));
            }
            $message = "";
            // Query for checking the inputs
            $checkQuery = $db->query("SELECT user FROM Customer WHERE user=\"$user\";");
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($lastName) && !empty($firstName) && !empty($age) && !empty($gender) && !empty($email) && !empty($address) && !empty($phoneNumber) && !empty($affliation) && !empty($user) && !empty($verify)) {
                if ($_SERVER["REQUEST_METHOD"] = "POST" && empty(mysqli_fetch_assoc($checkQuery))) {
                    // Query for creating account
                    $userQuery = $db->query("INSERT INTO Customer (firstName, lastName, age, gender, email, address, phoneNumber, affliation, user) VALUES (\"$firstName\", \"$lastName\", \"$age\", \"$gender\", \"$email\", \"$address\", \"$phoneNumber\", \"$affliation\", \"$user\");");
                    $message = "You have successfully created a new account.";
                    header("Location: /login.php");
                } else if (empty($lastName) || empty($firstName) || empty($age) || empty($gender) || empty($email) || empty($address) || empty($phoneNumber) || empty($affliation)) {
                    $message = "The whole form needs to be filled out.";
                } else {
                    $message = "Your username has already been taken.";
                }
            }
            ?>
            <div class="form">
                <form method="post" action="" id="createForm">
                    <fieldset>
                        <legend>Account Information</legend>
                        <input type="text" name="firstName" id="firstName" placeholder="First Name" title="This field is required"/><br>
                        <input type="text" name="lastName" id="lastName" placeholder="Last Name" title="This field is required"/><br>
                        <input type="text" name="age" id="age" placeholder="Age" title="This field is required"/><br>
                        <select name="gender" id="gender" title="This field is required">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select><br>
                        <input type="text" name="email" id="email" placeholder="Email" title="This field is required"/><br>
                        <input type="text" name="address" id="address" placeholder="Address" title="This field is required"/><br>
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" title="This field is required"/><br>
                        <select name="affliation" id="affliation" title="This field is required">
                            <option value="individual">Individual</option>
                            <option value="corporate">Corporate</option>
                        </select><br>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Login Information</legend>
                        <input type="text" name="username" id="username" placeholder="Username" title="This field is required"><br>
                        <input class="req" type="password" name="password" id="password" placeholder="Password" title="This field is required"><br>
                        <input class="req" type="password" name="verify" id="verify" placeholder="Verify Password" title="This field is required"><br>
                        <button type="submit" name="sub" id="submit">Submit</button>
                        <button type="reset" name="res" id="reset">Reset</button>
                    </fieldset>
                    <?php echo $message; ?>
                </form>
            </div>
        </div>
        <?php require_once("shorten/footer.php"); ?>
    </body>
</html>