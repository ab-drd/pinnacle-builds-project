<?php
    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordrepeat'];

        require_once 'function.inc.php';
        require_once 'connect.inc.php';

        if (invalidUsername($username) !== false) {
            header("location: ../../login.php?action=signup&error=invalidusername");
            exit();
        }

        if (usernameExists($db_connection, $username) !== false) {
            header("location: ../../login.php?action=signup&error=usernametaken");
            exit();
        }

        if (passwordLength($password) !== false) {
            header("location: ../../login.php?action=signup&error=passwordtooshort");
            exit();
        }

        if (passwordMatch($password, $passwordRepeat) !== false) {
            header("location: ../../login.php?action=signup&error=passwordsdontmatch");
            exit();
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        create_account($db_connection, $username, $passwordHash);
    }
    else {
        header("location: ../../login.php?action=signup");
        exit();
    }
?>