<?php
    session_start();
?>

<!DOCTYPE html> 

<html>
    <head>
        <meta charset="UTF-8">
        <link href="./styles/header.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <ul class="tabsLeft">
                <li id ="logo"><a href = "./index.php"><img src = "./images/icon.png" height="40" width="40"/></a></li>
                <li id="build"><a id=builder href="./builder.php">BUILD</a></li>
                <li id="desktops"><a href="desktops.html">DESKTOPS</a></li>
                <li id="laptops"><a href="laptops.html">LAPTOPS</a></li>
                <li id="about"><a href="about.html">ABOUT US</a></li>
            </ul>
            <ul class="tabsRight">
                <?php
                    if (isset($_SESSION["username"])) {
                        echo '<li id="profile"><a href="./profile.php">' . $_SESSION["username"] . "'" . 's PROFILE</a></li>';
                        echo '<li id="logout"><a href="./src/includes/logout.inc.php">LOG OUT</a></li>';
                    }
                    else {
                        print '<li id="signup"><a href="./signup.php">SIGN UP</a></li>';
                        print '<li id="login"><a href="./login.php">LOG IN</a></li>';
                    }
                ?>
                <li id="cart"><a href="./viewcart.php"><img src = "./images/cart.png" height="32" width="32"/></a></li>
            </ul>
        </header>
    </body>
</html>

