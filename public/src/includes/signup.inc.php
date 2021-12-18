<?php
    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];

        require_once 'function.inc.php';
        require_once 'connect.inc.php';

        if (invalidUsername($username) !== false) {
            header("location: ../signup.php?error=invalidusername");
            exit();
        }

        if (passwordLength($password) !== false) {
            header("location: ../signup.php?error=passwordtooshort");
            exit();
        }

        if (passwordMatch($password, $passwordRepeat) !== false) {
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }

        if (usernameExists($db_connection, $username) !== false) {
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        create_account($db_connection, $username, $passwordHash);
    }
    else {
        header("location: ../signup.php");
        exit();
    }
?>