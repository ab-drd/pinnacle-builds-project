<?php
    include "componentClasses.php";

    if(isset($_GET["q"])) {
        $CPU = true;
    }

    if ($CPU) {
        $cpus = "";

        include "connect.php";

        $query = "SELECT CPU.id, c.model, CPU.socket, CPU.cores, CPU.clock_speed, CPU.tdp FROM CPU JOIN component AS c ON CPU.id = c.id";
        $result = pg_query($db_connection, $query);

        if(pg_num_rows($result) > 0) {

            $arrayObject = array();
            $counter = 0;

            while($row = pg_fetch_assoc($result)) {
                #echo "id: " . $row['id'] . "<br>";
                $cpuObject = new CPU();
                $cpuObject->id = $row['id'];
                $cpuObject->model = $row['model'];
                $cpuObject->socket = $row['socket'];
                $cpuObject->cores = $row['cores'];
                $cpuObject->clock_speed = $row['clock_speed'];
                $cpuObject->TDP = $row['tdp'];
                
                $arrayObject[$counter] = (array) $cpuObject;
                $counter++;
            }

            $jsonObject = json_encode($arrayObject);
            echo $jsonObject;
        }
    }
?>