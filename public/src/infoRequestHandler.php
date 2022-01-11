<?php
    if (isset($_GET["component"]) && isset($_GET["model"])) {
        require_once "./includes/connect.inc.php";
        
        $component = $_GET["component"];
        $model = $_GET["model"];

        $query = "SELECT * FROM component AS c JOIN $component AS cmp ON c.id = cmp.id WHERE c.model = '$model';";
        $result = pg_query($db_connection, $query);

        if ($row = pg_fetch_assoc($result)) {
            echo json_encode($row);
        }
        else {
            echo 0;
        }
    }
?>