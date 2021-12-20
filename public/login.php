<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
<div class="container">
    <form action="./src/includes/login.inc.php" method="post" class="form" id="login">
        <h1 class="form__title">Login</h1>
        <div class="form__message-form__message--error"></div>
        <div class="form__input-group">
            <input type="text" class="form__input" name="username" autofocus placeholder="Username" required>
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" class="form__input" name="password" autofocus placeholder="Password" required>
            <div class="form__input-error-message"></div>
        </div>
        <input class="form__button" type="submit" name="submit" value="Login">
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "wrongsignin") {
                    echo "<p class='form__message'>Incorrect username/password</p>";
                }
            }
        ?>
        <p class="form__text">
            <a lass="form__link" href="./login.php" id="linkCreateAccount"> Don't have an account? Create one!</a>
        </p>
    </form>
    <form action="./src/includes/signup.inc.php" method="post" class="form form--hidden" id="createAccount">
        <h1 class="form__title">Create Account</h1>
        <div class="form__message-form__message--error"></div>
        <div class="form__input-group">
            <input type="text" id="signupUsername" class="form__input" name="username" autofocus placeholder="Username">
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" class="form__input" name="password" autofocus placeholder="Password">
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" class="form__input" name="passwordrepeat" autofocus placeholder="Confirm Password">
            <div class="form__input-error-message"></div>
        </div>
        <input class="form__button" type="submit" name="create" value="Sign up">
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidusername") {
                    echo "<p class='form__message'>Choose proper username</p>";
                }
                else if ($_GET["error"] == "passwordtooshort") {
                    echo "<p class='form__message'>Password must be at least 6 characters long</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p class='form__message'>Your passwords don't match</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p class='form__message'>That username is already taken</p>";
                }
                else if ($_GET["error"] == "stmtfailed" || $_GET["error"] == "end") {
                    echo "<p class='form__message'>Something went wrong, try again</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p class='form__message'>Account successfully created, you may now log in</p>";
                    echo `<p><a href="./">Log in now!</a></p>`;
                }
            }
        ?>
        <p class="form__text">
            <a lass="form__link" href="./login.php" id="linkLogin">Already have an account? Sign in.</a>
        </p>
    </form>
</div>
    <script src="./scripts/login.js"></script>
</body>