<?php
    session_start();
?>
<!DOCTYPE html>

<html>
    <body>
        <?php
            if (isset($_SESSION["username"])) {
                echo `<li><a href="profile.php">Profile page</a></li>`;
                echo `<li><a href="includes/logout.inc.php">Log out</a></li>`;
            }
            else {
                echo `<li><a href="signup.php">Sign up</a></li>`;
                echo `<li><a href="login.php">Log in</a></li>`;
            }
        ?>
    </body>
</html>
