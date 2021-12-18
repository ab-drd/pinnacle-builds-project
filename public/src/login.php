<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>User login | PHP</title>
    </head>
    <body>
        <div>
            <form action="./includes/login.inc.php" method="post">
                <div class="container">
                    <h1>Log into existing account</h1>
                    <p>Fill the form:</p>
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username" placeholder="Username..." required>
                    <br>
                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" placeholder="Password..." required>
                    <br>
                    <input type="submit" name="submit" value="Sign in">
                </div>
            </form>
        </div>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "wrongsignin") {
                    echo "<p>Incorrect username/password</p>";
                }
            }
        ?>
    </body>
</html>