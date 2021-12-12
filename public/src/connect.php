<?php
    session_start();

    $db_connection = pg_connect("host=localhost port=5432 dbname=pinnacle_builds_db user=root password=root");
    if($db_connection)
    {
        echo "connected";
    }
?>