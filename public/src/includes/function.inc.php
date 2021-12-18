<?php
    function invalidUsername($username) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username) || $username == "admin" || $username == "null") {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    function passwordLength($password) {
        $result;
        if (strlen($password) < 6) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function passwordMatch($password, $passwordRepeat) {
        $result;
        if ($password !== $passwordRepeat) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function usernameExists($connection, $username) {

        $query = "SELECT ru.id, ru.username, ru.password_hash FROM registered_user AS ru WHERE ru.username = $1";
        $statement = pg_prepare($connection, "checkUsername", $query);

        if (!$statement) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $res = pg_execute($connection, "checkUsername", array($username));
        
        if ($row = pg_fetch_assoc($res)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
    }

    function create_account($connection, $username, $passwordHash) {
        $query = "INSERT INTO registered_user(id, username, password_hash, date_created) VALUES ($1, $2, $3, $4);";

        $statement = pg_prepare($connection, "create", $query);

        if (!$statement) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $dateAndTime = date("Y/m/d h:i:s");

        $res = pg_execute($connection, "create", array(get_id($connection),
        $username, $passwordHash, $dateAndTime));

        if ($res) {
            header("location: ../signup.php?error=none");
        }
        else {
            header("location: ../signup.php?error=end");
        }
        
        exit();
    }

    function get_id($connection) {
        $query = "SELECT MAX(id) as id FROM registered_user";
        $res = pg_query($connection, $query);
        
        if(pg_num_rows($res) > 0) {
            while ($row = pg_fetch_assoc($res)) {
                return $row['id'] + 1;
            }
        }
    }

    function loginUser($connection, $username, $password) {
        $usernameExists = usernameExists($connection, $username);

        if ($usernameExists === false) {
            header("location: ../login.php?error=wrongsignin");
            exit();
        }

        $dbHash = $usernameExists['password_hash'];

        $checkPassword = password_verify($password, rtrim($dbHash));
        if ($checkPassword === false) {
            header("location: ../login.php?error=wrongsigninpass");
            exit();
        }
        else if ($checkPassword === true) {
            session_start();
            $_SESSION["userid"] = $usernameExists["id"];
            $_SESSION["username"] = $usernameExists["username"];
            header("location: ../redirect.php");
            exit();
        }
    }

    function verify_pass() {
        return true;
    }
?>