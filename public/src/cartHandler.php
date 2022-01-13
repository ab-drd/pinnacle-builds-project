<?php
    if (isset($_GET["action"])) {
        require_once "./includes/connect.inc.php";

        switch ($_GET["action"]){
            case "save":
                saveCart($db_connection);
                break;
            case "load":
                loadCart($db_connection);
                break;
        }
    }

    

    function createConfiguration($db_connection) {
        $price = $_GET["price"];

        $query = "INSERT INTO pc_configuration(total_price, ismadebyuser, name) VALUES ($price, TRUE, '');";
        $result = pg_query($db_connection, $query);

        if ($result) {
            $query2 = "SELECT id FROM pc_configuration ORDER BY id DESC LIMIT 1";
            $result2 = pg_query($db_connection, $query2);

            if ($row = pg_fetch_assoc($result2)) {
                $confID = $row["id"];
                echo $confID . " ";
            }
            else {
                $confID = 0;
            }
        }
        else {
            $confID = 0;
        }

        if ($confID) {
            for ($i = 0; $i < 8; $i++) {
                $model = $_GET["comp_$i"];
                $query = "SELECT id FROM component WHERE model = '$model';";
                $result = pg_query($db_connection, $query);
                if ($row = pg_fetch_assoc($result)) {
                    $id = $row['id'];

                    $query2 = "INSERT INTO configuration_component(component_id, configuration_id) VALUES ($id, $confID);";
                    $result2 = pg_query($db_connection, $query2);

                    if (!$result2) {
                        echo 0;
                        exit();
                    }
                }
            }
        }
        return $confID;
    }

    function saveCart($db_connection) {
        $confID = createConfiguration($db_connection);
        $user_id = $_GET["user_id"];
        
        $query = "INSERT INTO cart(user_id, pc_configuration) VALUES ($user_id, $confID);";
        $result = pg_query($db_connection, $query);

        if ($result) {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    function loadCart($db_connection) {
        $user_id = $_GET["user_id"];
        $echoArray = array();

        $query = "SELECT pc.id, c.model FROM cart JOIN pc_configuration AS pc ON cart.pc_configuration = pc.id
                 JOIN configuration_component AS cc ON pc.id = cc.configuration_id
                 JOIN component AS c ON cc.component_id = c.id
                 WHERE cart.user_id = $user_id;";

        $result = pg_query($db_connection, $query);
        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                array_push($echoArray, trim($row["model"]));
            }

            echo json_encode($echoArray);
        }
        else {
            echo 0;
        }
    }
?>