<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>User registration | PHP</title>
    </head>
    <body>
        <div>
            <form action="./includes/signup.inc.php" method="post">
                <div class="container">
                    <h1>Registration</h1>
                    <p>Fill the form:</p>
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username" required>
                    <br>
                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" required>
                    <br>
                    <label for="passwordRepeat"><b>Repeat Password</b></label>
                    <input type="password" name="passwordRepeat" required>

                    <input type="submit" name="create" value="Sign up">
                </div>
            </form>
        </div>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidusername") {
                    echo "<p>Choose proper username</p>";
                }
                else if ($_GET["error"] == "passwordtooshort") {
                    echo "<p>Password must be at least 6 characters long</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Your passwords don't match</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>That username is taken</p>";
                }
                else if ($_GET["error"] == "stmtfailed" || $_GET["error"] == "end") {
                    echo "<p>Something went wrong, try again</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>Account successfully created, you may now log in</p>";
                    echo '<p><a href="./login.php">Log in now!</a></p>';
                }
            }
        ?>
    </body>
</html>