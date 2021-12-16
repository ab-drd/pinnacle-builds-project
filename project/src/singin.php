<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>User login | PHP</title>
    </head>
    <body>
        <div>
            <form action="login.php" method="post">
                <div class="container">
                    <h1>Log into existing account</h1>
                    <p>Fill the form:</p>
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username" placeholder="Username..." required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" placeholder="Password..." required>

                    <input type="submit" name="login" value="Sign in">
                </div>
            </form>
        </div>
    </body>
</html>