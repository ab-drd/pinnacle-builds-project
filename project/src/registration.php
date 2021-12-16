<?php
    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $password = hash("sha256", $_POST['password']);

        include "connect.php";

        $query = "SELECT ru.id, ru.username, ru.password_hash FROM registered_user AS ru ORDER BY ru.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $usernameUnique = true;
            $lastId = 0;

            while ($row = pg_fetch_assoc($result)) {
                if ($username == $row['username']) {
                    echo "Username already exists";
                    $usernameUnique = false;
                    break;
                }
                $lastId = $row['id'];
            }

            if ($usernameUnique) {
                create_account($lastId + 1, $username, $password);
            }
        }
    }

    function create_account($id, $username, $password) {
        include "connect.php";
        $dateAndTime = date("Y/m/d h:i:s");
        $query = "INSERT INTO registered_user(id, username, password_hash, date_created) VALUES ($id, '$username', '$password', '$dateAndTime');";

        $result = pg_query($db_connection, $query);

        if ($result) {
            echo "Account successfully created!";
        }
        else {
            echo "Something went wrong.";
        }
    }
?>