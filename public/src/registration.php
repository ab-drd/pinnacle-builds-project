<?php
    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $password = hash("sha256", $_POST['password']);

        include "connect.php";

        
    }
?>