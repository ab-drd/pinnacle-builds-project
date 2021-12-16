<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = hash("sha256", $_POST['password']);

        include "connect.inc.php";

        $query = "SELECT ru.id, ru.username, ru.password_hash FROM registered_user AS ru ORDER BY ru.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $loginSuccessful = false;

            while ($row = pg_fetch_assoc($result)) {
                if ($username == rtrim($row['username'])) {
                    if ($password == rtrim($row['password'])) {
                        echo "Login successful!";
                        $loginSuccessful = true;
                        break;
                    }
                }
            }

            if (!$loginSuccessful) {
                echo "Incorrect username/password";
            }
        }
    }

?>