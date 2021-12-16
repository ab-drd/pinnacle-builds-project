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
    </body>
</html>