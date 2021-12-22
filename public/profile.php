<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Login / Sign up Form</title>
        <link rel="shortcut icon" href="/assets/favicon.ico">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <?php require_once "./src/header.php"?>
        <div class="container">
            <?php
                echo "Welcome, " . $_SESSION['username'];
            ?>
        </div>
        <?php require_once "./src/footer.html" ?>
    </body>
</html>